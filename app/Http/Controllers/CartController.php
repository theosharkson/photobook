<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cartItems = Order::whereIn('process_status',[getTempId(), getPaymentId()])
                        ->where('user_id',Auth::id())
                        ->where('active_status',1)
                        ->first();

        if (empty($cartItems)) {
            return redirect()->route('site');
        }

        if ($cartItems->process_status == getPaymentId()) {
            return redirect()->route('checkout');
        }

        return view('site.orders.cart',compact('cart_sub_total','cart_bonus'));
    }




    public function checkout()
    {
        $user = Auth::user();
        return view('site.orders.checkout',compact('user'));
    }


    public function selectPaymentMethod()
    {
        return view('site.orders.select_payment_order',compact('user'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
