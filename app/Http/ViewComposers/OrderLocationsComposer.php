<?php
namespace App\Http\ViewComposers;

use App\OrderLocation;
use Illuminate\View\View;


class OrderLocationsComposer
{
	public function compose(View $view)
	{
		$order_locations = OrderLocation::paginate(10);
		$view->with('order_locations',$order_locations);
	}
}