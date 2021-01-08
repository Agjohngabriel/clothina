<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variety;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (\Cart::getsubtotal() - $discount);
        $newTotal = $newSubtotal;
        $varieties = Variety::all();
        $cartCollection = \Cart::getContent();
        return view('cart')->with([
            'cartCollection' => $cartCollection,
            'varieties' => $varieties,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'slug' => $request->slug,
                'details' => $request->details
            ),
            'associatedModel' => 'App\Models\Product'
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
    
    }
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item has been removed');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id, 
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Updated successully');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Cart has been emptied');
    }
}
