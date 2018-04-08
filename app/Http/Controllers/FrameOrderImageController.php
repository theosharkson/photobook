<?php

namespace App\Http\Controllers;

use App\FrameOrderImage;
use Illuminate\Http\Request;

class FrameOrderImageController extends Controller
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
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            ]);

        $params = $request->all();
        

        //Add The Image
        if(!empty($request->file('image'))){
            $params['image'] = save_image( $request->file('image'), 'frame_orders');
        }

        return response()->json(['success'=>'done','product_image_id'=>111,'image'=>$params['image']]);

        return response()->json(['error'=>'Not Found']);

        dd($params);

        //Create the frame
        try {

          Frame::create($params);

        } catch (Exception $e) {

            return redirect()->back()->with('error_message','Sorry, Unable to Add Frame.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrameOrderImage  $frameOrderImage
     * @return \Illuminate\Http\Response
     */
    public function show(FrameOrderImage $frameOrderImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrameOrderImage  $frameOrderImage
     * @return \Illuminate\Http\Response
     */
    public function edit(FrameOrderImage $frameOrderImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrameOrderImage  $frameOrderImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrameOrderImage $frameOrderImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrameOrderImage  $frameOrderImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrameOrderImage $frameOrderImage)
    {
        //
    }
}
