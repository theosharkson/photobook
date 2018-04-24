@extends('layouts.site')

@section('content')
        <!-- Start Page Hero -->
        <section class="page-hero">
            <div class="page-hero-parallax">
                
                <div class="hero-image bg-shop">
                     
                    <div class="hero-container container pt50">  
                        <div class="hero-content text-left scroll-opacity"> 
                            <div class="section-heading">
                                <h1 class="white mb10">Payment Method</h1>
                                <h5 class="white pl5">Proceed to make payments</h5>  
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
            
            <section class="pt40 pb100">   
              <div class="container font-awesome-icons-list text-center">

                <div class="fa-hover ">
                    <img style="max-width: 120px" src="{{url('/img/payment-methods/mobile-money.jpg')}}" alt="#">
                    <br>Mobile Money
                </div> 

                {{-- <div class="fa-hover ">
                    <i class="fab fa-cc-paypal"></i><br>
                    Paypal
                </div>
                
                <div class="fa-hover ">
                    <i class="fab fa-cc-mastercard"></i>
                    <br>Mastercard
                </div>

                <div class="fa-hover ">
                    <i class="fab cc-visa"></i>
                    <br>Visa
                </div> --}}

            </section>  
       
            
            <!-- Start Back To Top -->
            <a id="back-to-top"><i class="icon ion-chevron-up"></i></a>
            <!-- End Back To Top -->
            
        </div><!-- End Site Wrapper --> 

@endsection

@section('scripts')


@endsection