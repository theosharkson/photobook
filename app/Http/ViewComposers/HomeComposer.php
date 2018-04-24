<?php
namespace App\Http\ViewComposers;


use App\Order;
use App\OrderLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class HomeComposer
{
	public function compose(View $view)
	{
		$cart_sub_total = 0;
        $cart_bonus = 0;

		$cartItems = Order::whereIn('process_status', [getTempId(), getPaymentId()])
						->where('user_id',Auth::id())
						->where('active_status',1)
						->first();
		// dd($cartItems->toArray());
		
		$order_locations = OrderLocation::get();

		$view->with('cartItems',$cartItems);
		$view->with('order_locations',$order_locations);
		$view->with('cart_bonus',$cart_bonus);
		$view->with('cart_sub_total',$cart_sub_total);

	}
}
