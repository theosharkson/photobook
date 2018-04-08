<?php
namespace App\Http\ViewComposers;


use App\Frame;
use Illuminate\View\View;



class FrameListComposer
{
	public function compose(View $view)
	{
		$frames = Frame::orderBy('created_at','desc')->paginate(12);

		$view->with('frames',$frames);
	}
}

