<?php

namespace App\Http\Controllers;

use App\FrameOrder;
use App\FrameOrderImage;
use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrameOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'quantity' => 'required',
            'frame_id' => 'required',
        ]);

        $params = $request->all();

        $params['user_id'] = Auth::id();
        $params['process_status'] = getTempId();
        $params['date'] = Carbon::now();

        
        // Check if there is an existing order
        $order = Order::where('process_status',getTempId())
                            ->where('user_id',Auth::id())
                            ->where('active_status',1)
                            ->first();

        //Create a new temp order if query above is empty else use the id from the result above
        if(empty($order)){
            
            //Try to create the order
            try {

                $order = Order::create($params);
                $params['order_id'] = $order->id;

            } catch (Exception $e) {
                return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!');
            }

        }else{

            $params['order_id'] = $order->id;
        }
        



        //Try To create the Frame Temp Order Details (Cart Item)
        try {

            $frame_order = FrameOrder::create($params);

        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!');

        }

       
        try {
             //Update the Order Images uploaded with the frame_order id
            FrameOrderImage::where('code' , $params['image_code'])
                                    ->update(['frame_order_id'=>$frame_order->id]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!');
        }



        return redirect()->back()->with('success_message','Frame Added to Cart Successful!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrameOrder  $frameOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FrameOrder $frameOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrameOrder  $frameOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FrameOrder $frameOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrameOrder  $frameOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrameOrder $frameOrder)
    {
        $params = $request->all();

        if (empty($params['quantity'])) {
            return redirect()->back()->with('warning_message','Item Quantity can not be less than one (1)');
        }

        try {
            
            $frameOrder->update(['quantity' => $params['quantity']]);

        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry Frame Order Item could not be updated!.');
        }

        return redirect()->back()->with('success_message','Order Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrameOrder  $frameOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrameOrder $frameOrder)
    {   

        try {
            
            //Remove the Images
            FrameOrderImage::where('frame_order_id' , $frameOrder->id)->delete();

            //Remove the frame order
            $frameOrder->delete();
            
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error_message','Sorry Frame Order Item could not be removed!.');
        }


        return redirect()->back()->with('success_message','Order Item Removed Successfully');
    }
}
