<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Models\Variety;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;
use App\helpers;
use App\Mail\OrderPlaced;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Exception\CardErrorException;
class CheckoutController extends Controller
{
    public function index()
     {
     	$discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (\Cart::getsubtotal() - $discount);
        $newTotal = $newSubtotal;
        $varieties = Variety::all();
        return view('checkout')->with([
            'varieties' => $varieties,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal
        ]);
     }
     
    public function store(CheckoutRequest $request)
     {

        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $contents = \Cart::getContent()->map(function ($item)
        {
            return $item->model->slug. ',' .$item->quantity;
        })->values()->toJson();

         try {
             $charge = \Stripe::charges()->create([
                'amount' => \Cart::getTotal(),
                'currency' => 'CAD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => \Cart::getTotalQuantity(),
                    'discount' => collect(session()->get('coupon'))->toJson(),
                ],
             ]);

             $order = $this->addToOrdersTables($request, null);
            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Mail::send(new OrderPlaced($order));

             \Cart::clear();
             session()->forget('coupon');

             return redirect()->route('confirm')->with('success_msg', 'Successful');
         } catch (CardErrorException $e) {
             return back()->withErrors('Error! ' . $e->getMessage());
         }
    }

     protected function addToOrdersTables($request, $error)
    {

        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = (\Cart::getSubtotal() - $discount);
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTotal = $newSubtotal;
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_state' => $request->state,
            'billing_country' => $request->country,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => $discount,
            'billing_discount_code' => $code,
            'billing_subtotal' => $newSubtotal,
            'billing_total' => $newTotal,
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (\Cart::getContent() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->quantity,
            ]);
        }

        return $order;
    }
    protected function decreaseQuantities()
    {
        foreach (\Cart::getContent() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->quantity]);
        }
    }
    protected function productsAreNoLongerAvailable()
    {
        foreach (\Cart::getContent() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->quantity) {
                return true;
            }
        }

        return false;
    }
}
