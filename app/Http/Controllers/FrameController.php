<?php

namespace App\Http\Controllers;

use App\Frame;
use App\FrameSize;
use App\Orientation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrameController extends Controller
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




    /*Request Frame For Site*/
    public function requestFrame()
    {
        $frames = Frame::get();
        $orientations = Orientation::get();
        $frame_sizes = FrameSize::get();
        return view('site.frames.request_form',compact('frames','orientations','frame_sizes'));
    }











    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frames.create');
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
            'orientation' => 'required',
            'size' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'price' => 'required',
            'dimension' => 'required',
            ]);

        $params = $request->all();
        

        //Add The Image
        if(!empty($request->file('image'))){
            $params['image'] = save_image( $request->file('image'), 'frames');
        }

        //Create the frame
        try {

          Frame::create($params);

        } catch (Exception $e) {

            return redirect()->back()->with('error_message','Sorry, Unable to Add Frame.');
        }


        return redirect()->back()->with('success_message','Frame added successfully!!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function show(Frame $frame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function edit(Frame $frame)
    {
        return view('admin.frames.edit',compact('frame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frame $frame)
    {
        $this->validate($request, [
            'name' => 'required',
            'orientation' => 'required',
            'size' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
            'price' => 'required',
            'dimension' => 'required',
            ]);

        $params = $request->all();
        $params['updated_by'] = Auth::id();

        //Add The Image if any was sent
        if(!empty($request->file('image'))){
            $params['image'] = save_image( $request->file('image'), 'frames');
        }

        //Try the update action
        try {
            $new_frame = $frame->update($params);
            
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Unable to modify Frame');
        }


        return redirect()->back()->with('success_message','Frame modified successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frame $frame)
    {
         try {
            $frame->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors('error_message','Sorry, Something went wrong!!. There may some resources depending on this frame.');
        }

        return redirect()->route('frames.create')->with('success_message','Frame Deleted Successful!!');
    }
}
