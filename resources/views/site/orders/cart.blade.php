@extends('layouts.site')

@section('content')
        <!-- Start Page Hero -->
        <section class="page-hero">
            <div class="page-hero-parallax">
                
                <div class="hero-image bg-shop">
                     
                    <div class="hero-container container pt50">  
                        <div class="hero-content text-left scroll-opacity"> 
                            <div class="section-heading">
                                <h1 class="white mb10">Shoping Cart</h1>
                                <h5 class="white pl5">Save Up To 70% Off Sale</h5>  
                            </div>  
                            <ol class="breadcrumb">
                                <li><a href="{{route('site')}}">Home</a></li>
                                <li class="active">Cart</li>
                            </ol>
                        </div> 
                    </div> 
                    
                </div> 
                
            </div>
        </section>
        <!-- End Page Hero -->
        
        <div class="site-wrapper">
            
            <!-- Cart -->
            <section class="cart pt60 pb60">
                <div class="container"> 
                    <div class="row">
                        
                        <div class="col-sm-9 mt40 mb40">

                            @if(!empty($cartItems->frameOrders))
                            <div>
                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <h4 class="bag-summary mb20">Frame Orders</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('request.frames')}}" class="highlight mt10 pull-right">Continue Shopping</a>
                                    </div>

                                </div>
                                <table class="shop_table cart" cellspacing="0">
                                    
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Frame</th>
                                            <th class="product-name">Your Image</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Subtotal</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($cartItems->frameOrders as $frame_order)

                                            @php 
                                            $cart_sub_total = $cart_sub_total + ($frame_order->frame->price * $frame_order->quantity) 
                                            @endphp

                                            <tr class="cart_item">
                                                <td class="product-thumbnail">
                                                    
                                                    <a href="#">
                                                        <img src="{{route('frames.images.thumb_path')}}/{{$frame_order->frame->image}}" alt="#">
                                                    </a> 
                                                </td>
                                                <td class="product-name">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                          <img class="cart-user-image" src="{{route('frame_orders.images.thumb_path')}}/{{$frame_order->userImage->first()->image}}" alt="#">  
                                                        </div>
                                                        <div class="col-xs-6">
                                                            {{-- <div>{{$frame_order->userImage->count()}}</div> --}}
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">
                                                        {{getCurrencyCode()}}
                                                        {{$frame_order->frame->price}}
                                                    </span> 
                                                </td>
                                                <td class="product-quantity">
                                                    <form id="delete_form{{$frame_order->id}}" action="{{route('frame-orders.update',['frameOrder'=>$frame_order->id])}}"
                                                      method="POST">
                                                        <input name="_method" type="hidden" value="PUT">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-sm-3">

                                                              <input type="number" step="1" min="1" name="quantity" value="{{$frame_order->quantity}}" class="qty" size="4">

                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input class="btn-dark btn-xs" type="submit" value="update">
                                                            </div>
                                                        </div>
                                                    </form>

                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">
                                                        {{getCurrencyCode()}}
                                                        {{$frame_order->frame->price * $frame_order->quantity}}
                                                    </span> 
                                                </td>

                                                <td class="product-remove">
                                                    <a class="remove" href="javascript:;"
                                                        onclick="event.preventDefault();
                                                                if(confirm('Are you sure you want to delete this Item')){
                                                                 document.getElementById('delete_form{{$frame_order->id}}').submit();}"
                                                    >     
                                                        ×
                                                    </a>

                                                    <form id="delete_form{{$frame_order->id}}" action="{{route('frame-orders.destroy',['frameOrder'=>$frame_order->id])}}"
                                                      method="POST" style="display: none;">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                    
                                </table>
                            </div>
                            @endif
                            
                           {{--  <form class="coupon mb-xs-24">
                                <h5>Add a coupon code:</h5>
                                <input class="coupon-code" type="text" placeholder="Coupon Code">
                                <input class="apply-btn btn-dark" type="submit" value="Apply">
                            </form> --}}
                            
                        </div>  
                        
                        
                        <div class="col-sm-3 mt40 mb40">
                            <h4 class="bag-totals mb20">Cart Totals</h4>
                            <div class="cart_totals">
                                <table cellspacing="0">
                                    <tbody>

                                        <tr class="cart-subtotal">
                                           <p><b>Pickup Location</b></p>
                                           <form id="orderLocatinForm" action="{{route('orders.update-location',['order'=>$cartItems->id])}}" method="POST">
                                            {{ csrf_field() }}
                                            <select name="order_locations_id" 
                                            onchange="document.getElementById('orderLocatinForm').submit();" 
                                            class="form-control select">
                                                @foreach($order_locations as $location)
                                                    <option @if(!empty(old('location')) and old('location') == $cartItems->order_locations_id)
                                                            selected="" 
                                                          @elseif($cartItems->order_locations_id == $location->id)
                                                            selected="" 
                                                          @endif
                                                    value="{{$location->id}}">{{$location->location}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                            
                                        </tr>


                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">
                                                    {{getCurrencyCode()}}
                                                    {{$cart_sub_total}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Bonuses</th>
                                            <td>
                                                <span class="amount">
                                                    {{getCurrencyCode()}}
                                                    {{$cart_bonus}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th  style="width: 70%;">
                                                Transportation Cost
                                            </th>
                                            <td>
                                                <span class="amount">
                                                    {{getCurrencyCode()}}
                                                    {{$cartItems->orderLocation->transportation_cost}}
                                                </span>
                                            </td>
                                        </tr>

                                        

                                        {{-- <tr class="shipping">
                                            <th>Shipping</th>
                                            <td><p>Free</p></td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong>
                                                    <span class="amount">
                                                        {{getCurrencyCode()}}
                                                        {{($cartItems->orderLocation->transportation_cost + $cart_sub_total) - $cart_bonus}}
                                                    </span>
                                                </strong> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('checkout')}}" class="btn btn-primary btn-md btn-appear"><span>Checkout <i class="ion-bag"></i></span></a> 
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                </div>
            </section>
            <!-- End Cart -->
        
            <!-- Start Footer 1 -->
            <footer id="footer-1" class="pt60 pb50">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-md-4">
                            <h4>About Purefive</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam molestie, tellus id pellentesque feugiat, sem sem cursus orci, a placerat ante ante nec massa.</p>
                            <p><a href="http://themeforest.net/user/vossendesign/portfolio" target="_blank">© 2015 Purefive · </a>Made with <i class="ion-heart highlight"></i> for great people.</p>
                        </div>

                        <div class="col-md-4"> 
                            <h4>Follow us</h4>
                            <ul class="footer-1-social">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dropbox"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li> 
                                <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-spotify"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li> 
                                <li><a href="#"><i class="fa fa-reddit"></i></a></li>
                                <li><a href="#"><i class="fa fa-tripadvisor"></i></a></li> 
                            </ul>
                        </div>   
                         
                        <div class="col-md-4">
                            <div class="subscription">
                                <h4>Newsletter</h4> 
                                    
                                <form action="php/subscribe-mailchimp.php" method="post" id="subscribe-form" role="form">
                                    <div class="form-validation alert"></div>
                                    <div class="form-group subscribe-form-input">
                                        <input type="email" name="email" id="subscribe-form-email" class="footer-subscribe-input" placeholder="Enter your email to subscribe *" autocomplete="off" />   
                                    </div>
                                </form>
                                <p class="subscribe-info"><i class="ion-information-circled"></i> We will never send you spam or share your email with third parties</p>
                                    
                            </div>
                        </div>  
                        
                    </div>
                </div>  
                
			</footer>
            <!-- End Footer 1 -->
            
            <!-- Start Back To Top -->
            <a id="back-to-top"><i class="icon ion-chevron-up"></i></a>
            <!-- End Back To Top -->
            
        </div><!-- End Site Wrapper --> 

@endsection

@section('scripts')


@endsection