<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', request()->coupon_code)->first();

        if (!$coupon) {
            return redirect()->back()->withErrors('invalid Coupon code please try again');
        }
        session()->put('coupon', [
            'name' =>$coupon->code,
            'discount' => $coupon->discount(\Cart::getsubtotal()),
        ]);
        return redirect()->back()->with('success_msg', 'Coupon has been applied');
    }

    /**
     * Remove the specified resource from storage   
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->back()->with('success_msg', 'Coupon has been removed');
    }
}
