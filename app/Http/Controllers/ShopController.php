<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variety;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $varieties = Variety::all();
        if (request()->variety) {
            $products = Product::with('Varieties')->WhereHas('Varieties', function($query){
                $query->Where('slug', request()->variety);
            });
            $categoryName = optional($varieties->where('slug', request()->variety)->first())->name;
        } else {        
            $products = Product::where('featured', true)->take(9);
            $categoryName = "Featured";
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->simplePaginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'DESC')->simplePaginate($pagination);
        }else{
            $products = $products->simplePaginate($pagination);
        }
        $recents = $products->sortBy('created_at')->take(3);       

        
        return view('shop')->with(
            [
                'products' => $products,
                'categoryName' => $categoryName,
                'recents' => $recents,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstorfail();
        $varieties = variety::all();
        $mightAlsolike = Product::where('slug','!=', $slug)->inRandomOrder()->take(4)->get();
        if($product->quantity > setting('site.stock_threshold')){
            $stockLevel = $product->quantity . ' ' . "In stock";
        }elseif ($product->quantity < setting('site.stock_threshold') && $product->quantity > 0) {
            $stockLevel = "Low Stock";
        }else{
            $stockLevel = "Not Available";
        }
        return view('product')->with([
            'product' => $product,
            'mightAlsolike' => $mightAlsolike, 
            'varieties' => $varieties,
            'stockLevel' => $stockLevel,
        ]);
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();
        return view('searchResult')->with('products', $products);
    }
}
