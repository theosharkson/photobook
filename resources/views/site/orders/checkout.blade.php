@extends('layouts.site')

@section('content')
        <!-- Start Page Hero -->
        <section class="page-hero">
            <div class="page-hero-parallax">
                
                <div class="hero-image bg-shop">
                     
                    <div class="hero-container container pt50">  
                        <div class="hero-content text-left scroll-opacity"> 
                            <div class="section-heading">
                                <h1 class="white mb10">Cart Checkout</h1>
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
            <section class="checkout pt40 pb40">
                <div class="container"> 
                    <div class="row">
                        <form action="{{route('shippings.store')}}" method="POST" role="form"> 
                            {{ csrf_field() }} 
                            <div class="col-sm-8 col-sm-offset-2 text-center mt40 mb40">
         
                                <h3 class="underline-center mb20">Billing Details</h3>
                                
                                
                                <input type="text" 
                                        class="input-text {{ $errors->has('name') ? ' has-error' : '' }}" 
                                        name="name" 
                                        value="{{old('name')?old('name'):$user->name}}" 
                                        placeholder="Name *">
                                @if ($errors->has('name'))
                                    <span class="help-block error-help">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <div class="half-left col-sm-6">
                                    <input type="text" 
                                            class="input-text{{ $errors->has('email') ? ' has-error' : '' }}" 
                                            name="email" 
                                            value="{{old('email')?old('email'):$user->email}}" 
                                            placeholder="Email Address">
                                    @if ($errors->has('email'))
                                        <span class="help-block error-help">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif 
                                </div>

                                <div class="half-right col-sm-6">
                                    <input type="text" 
                                            class="input-text{{ $errors->has('phone_number') ? ' has-error' : '' }}" 
                                            name="phone_number" 
                                            value="{{old('phone_number')?old('phone_number'):$user->phone_number}}"
                                            placeholder="Phone Number *">
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block error-help">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                
                                <textarea placeholder="Notes" class="" name="description" rows="5">{{old('description')}}</textarea>
                                
                                
                                
                            </div>  
                            
                            <div class="col-sm-4 col-sm-offset-4 mt40 mb40">
                                <h4 class="bag-totals mb20">Your Order</h4>
                                <div class="cart_totals">

                                    @foreach($cartItems->frameOrders as $frame_order)
                                        @php 
                                        $cart_sub_total = $cart_sub_total + ($frame_order->frame->price * $frame_order->quantity) 
                                        @endphp
                                    @endforeach

                                    <table cellspacing="0">
                                        <tbody>

                                            <tr class="cart-subtotal">
                                                <th  style="width: 60%;">
                                                    Pickup Location
                                                </th>
                                                <td>
                                                    <span class="amount">
                                                        {{$cartItems->orderLocation->location}}
                                                    </span>
                                                </td>
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
                                        <a href="#" class="btn btn-primary btn-md btn-appear"><span>Place Order <i class="ion-android-checkmark-circle"></i></span></a> 
                                    </div>
                                </div> 
                            </div> 
                        </form>
                    </div>
                </div>
            </section>
            <!-- End Cart -->
       
            
            <!-- Start Back To Top -->
            <a id="back-to-top"><i class="icon ion-chevron-up"></i></a>
            <!-- End Back To Top -->
            
        </div><!-- End Site Wrapper --> 

@endsection

@section('scripts')


@endsection