<?php

namespace App\Http\Controllers;

use App\OrderLocation;
use Illuminate\Http\Request;
use Exception;

class OrderLocationController extends Controller
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
        return view('admin.order-locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'location' => 'required',
            'transportation_cost' => 'required',
            ]);

        $params = $request->all();

        try {
            OrderLocation::create($params);
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Something went wrong!!');
        }

        return redirect()->back()->with('success_message','Location Added Successful!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderLocation  $orderLocation
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLocation $orderLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderLocation  $orderLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLocation $orderLocation)
    {
        return view('admin.order-locations.edit',compact('orderLocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderLocation  $orderLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLocation $orderLocation)
    {
        $this->validate($request, [
            'location' => 'required',
            'transportation_cost' => 'required',
            ]);

        $params = $request->all();

        try {
            $orderLocation->update($params);
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Something went wrong!!');
        }

        return redirect()->route('order-locations.create')->with('success_message','Location Updated Successful!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderLocation  $orderLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLocation $orderLocation)
    {
        try {
            $orderLocation->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Something went wrong!!. There may some resources depending on this size.');
        }

        return redirect()->route('order-locations.create')->with('success_message','Location Deleted Successful!!');
    }
}
