@extends('layouts.admin')

@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                           
    <li><a href="{{route('orders.pending')}}">Pending Orders</a></li>                           
    <li class="active">Details</li>
</ul>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3><span class="fa fa-shopping-cart"></span> Order from {{$order->user->name}}</h3>
                    <span>View the detials of the current order</span>
                </div>                                     
                <ul class="panel-controls panel-controls-title">                                        
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a>
                    </li>
                </ul> 
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date/Time</th>
                            <th>From</th>
                            <th>Location</th>
                            <th>Frams</th>
                            <th>Photobooks</th>
                            <th>Canvas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="fa fa-clock-o"></span>
                                {{$order->created_at->diffForHumans()}}
                            </td>
                            <td>
                                <span class="fa fa-user"></span>
                                {{$order->user->name}}
                            </td>
                            <td>
                                    <span class="fa fa-map-marker"></span>
                                    {{!empty($order->orderLocation)?$order->orderLocation->location:''}}
                                </td>
                            <td>
                                <span class="label label-primary">
                                    {{$order->frameOrders->count()}}
                                </span>
                            </td>
                            <td>
                                <span class="label label-info">
                                    {{$order->photobookOrders->count()}}
                                </span>
                            </td>
                            <td>
                                <span class="label label-success">
                                    {{$order->canvasOrders->count()}}
                                </span>
                                
                            </td>
                            <td>
                                @if( $order->process_status ==  getNewId())
                                    <form action="{{route('orders.update',['order'=>$order->id])}}"
                                      method="POST" onsubmit="return confirm('Are you sure you want to mark this order as PROCESSED!?');">
                                        <input name="_method" type="hidden" value="PUT">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-3">

                                              <input type="hidden" name="process_status" value="{{getProcessedId()}}">

                                            </div>
                                            <div class="col-sm-9">
                                                <button class="btn btn-primary btn-lg" type="submit">
                                                    <span class="fa fa-check-square-o"></span>
                                                    Finish Processing
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                                {{-- <a href="{{route('orders.show',['order'=>$order->id])}}" class="btn btn-primary btn-rounded">
                                    <span class="fa fa-check-square-o"></span>
                                    Processed
                                </a>

                                <a href="{{route('orders.show',['order'=>$order->id])}}" class="btn btn-primary btn-rounded">
                                    <span class="fa fa-check-square-o"></span>
                                    Delivered
                                </a> --}}

                            </td>
                        </tr>
                    </tbody>
                </table>                                
            </div>
        </div>
        
    </div>

    <div class="col-md-12">
        <!-- TABS WIDGET -->
        <div class="panel panel-default tabs">
            <ul class="nav nav-tabs nav-justified">
                <li class="active">
                    <a href="#tab1" data-toggle="tab">
                        Frams 
                        <span class="label label-primary">
                            {{$order->frameOrders->count()}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tab2" data-toggle="tab">
                        Photobooks
                        <span class="label label-info">
                            {{$order->photobookOrders->count()}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tab3" data-toggle="tab">
                        Canvas
                        <span class="label label-success">
                            {{$order->canvasOrders->count()}}
                        </span>
                    </a>
                </li>
            </ul>
            <div class="panel-body tab-content">


                <div class="tab-pane active" id="tab1">
                    <table class="table table-hover">
                        
                        <thead>
                            <tr>
                                <th></th>
                                <th>Frame</th>
                                <th>Image Uploaded</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($order->frameOrders as $key => $frame_order)

                                <tr class="cart_item">
                                    <td class="product-thumbnail">
                                        {{$key}}
                                    </td>
                                    <td class="product-thumbnail">
                                        
                                        <a href="#">
                                            <img class="user-frame" src="{{route('frames.images.thumb_path')}}/{{$frame_order->frame->image}}" alt="#">
                                        </a> 
                                    </td>
                                    <td>
                                        <img class="user-uploaded-image" src="{{route('frame_orders.images.thumb_path')}}/{{$frame_order->userImage->first()->image}}" alt="#"> 
                                        
                                    </td>
                                    <td>
                                        <span class="amount">
                                            {{getCurrencyCode()}}
                                            {{$frame_order->frame->price}}
                                        </span> 
                                    </td>
                                    <td>
                                        <span class="user-qty">{{$frame_order->quantity}}</span>
                                    </td>
                                    <td>
                                        <span class="amount">
                                            {{getCurrencyCode()}}
                                            {{$frame_order->frame->price * $frame_order->quantity}}
                                        </span> 
                                    </td>

                                    <td>
                                       <a href="{{
                                        route('download-user-image',
                                            ['image'=>$frame_order->userImage->first()->image, 
                                             'name'=>$order->user->name.'-frameImage-'.$key])
                                         }}" class="btn btn-primary btn-rounded">
                                           <span class="fa fa-cloud-download"></span>
                                           Download User Image
                                       </a> 
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                        
                    </table>
                </div>





                <div class="tab-pane" id="tab2">
                    <p>No Photobooks Ordered</p>
                </div>




                <div class="tab-pane" id="tab3">
                    <p>No Canvas Ordered</p>
                </div>                        
            </div>
        </div>                        
        <!-- END TABS WIDGET -->
    </div>
</div>

@endsection
