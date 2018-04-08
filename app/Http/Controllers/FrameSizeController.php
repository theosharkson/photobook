<?php

namespace App\Http\Controllers;

use App\FrameSize;
use Illuminate\Http\Request;

class FrameSizeController extends Controller
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
        return view('admin.frame-sizes.create');
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
            'name' => 'required',
            'dimension' => 'required',
            ]);

        $params = $request->all();
        // dd($params);
        try {
            FrameSize::create($params);
        } catch (Exception $e) {
            return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!');
        }

        return redirect()->back()->with('success_message','Frame Size Added Successful!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrameSize  $frameSize
     * @return \Illuminate\Http\Response
     */
    public function show(FrameSize $frameSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrameSize  $frameSize
     * @return \Illuminate\Http\Response
     */
    public function edit(FrameSize $frameSize)
    {
        return view('admin.frame-sizes.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrameSize  $frameSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrameSize $frameSize)
    {
        $this->validate($request, [
            'name' => 'required',
            'dimension' => 'required',
            ]);

        $params = $request->all();

        try {
            $frameSize->update($params);
        } catch (Exception $e) {
            return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!');
        }

        return redirect()->route('frame-sizes.create')->with('success_message','Frame Size Updated Successful!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrameSize  $frameSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrameSize $frameSize)
    {
        try {
            $frameSize->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!. There may some resources depending on this size.');
        }

        return redirect()->route('frame-sizes.create')->with('success_message','Frame Size Deleted Successful!!');
    }
}
