<?php
namespace App\Http\ViewComposers;


use App\Frame;
use App\FrameSize;
use App\Orientation;
use Illuminate\View\View;



class FrameComposer
{
	public function compose(View $view)
	{
		$orientations = Orientation::get();
		$frame_sizes = FrameSize::get();
		$frames = Frame::paginate(12);

		$view->with('frame_sizes',$frame_sizes);
		$view->with('orientations',$orientations);
		$view->with('frames',$frames);
	}
}

