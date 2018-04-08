<?php
namespace App\Http\ViewComposers;

use App\FrameSize;
use Illuminate\View\View;


class FrameSizeComposer
{
	public function compose(View $view)
	{
		$frame_sizes = FrameSize::paginate(10);
		$view->with('frame_sizes',$frame_sizes);
	}
}