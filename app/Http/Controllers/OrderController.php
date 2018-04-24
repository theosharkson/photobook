<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_orders = Order::whereIn('process_status',[getNewId(),
                                                            getProcessingId(),
                                                            getProcessedId(),
                                                            getDeliveredId(),
                                                        ])
                                ->where('active_status',1)
                                ->orderBy('created_at','desc')
                                ->get();
        // dd($pending_orders->toArray());
        return view('admin.orders.all',compact('pending_orders'));
    }



    public function pending()
    {
        $pending_orders = Order::where('process_status',getNewId())
                                ->where('active_status',1)
                                ->orderBy('created_at','desc')
                                ->get();
        // dd($pending_orders->toArray());
        return view('admin.orders.pending',compact('pending_orders'));
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


    public function updateLocation(Request $request, Order $order)
    {

        $params = $request->all();
        // dd($params);

        try {
            
            $order->update($params);

        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry Order Location could not be updated!.');
        }

        return redirect()->back()->with('success_message','Order Location Updated Successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.details',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $params = $request->all();

        try {
            
            $order->update($params);

        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry Frame Order could not be updated!.');
        }

        return redirect()->route('orders.pending')->with('success_message','Order Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
