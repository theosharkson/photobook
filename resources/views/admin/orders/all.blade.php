@extends('layouts.admin')

@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                           
    <li class="active">Frame Sizes</li>
</ul>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3><span class="fa fa-shopping-cart"></span> Pending Orders</h3>
                    <span>a list of all pending orders</span>
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
                            <th>Canvas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pending_orders as $pending_order)
                            <tr>
                                <td>
                                    <span class="fa fa-clock-o"></span>
                                    {{$pending_order->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <span class="fa fa-user"></span>
                                    {{$pending_order->user->name}}
                                </td>
                                <td>
                                    <span class="fa fa-map-marker"></span>
                                    {{!empty($pending_order->orderLocation)?$pending_order->orderLocation->location:''}}
                                </td>
                                <td>
                                    <span class="label label-primary">
                                        {{$pending_order->frameOrders->count()}}
                                    </span>
                                </td>
                                <td>
                                    <span class="label label-info">
                                        {{$pending_order->photobookOrders->count()}}
                                    </span>
                                </td>
                                <td>
                                    <span class="label label-success">
                                        {{$pending_order->canvasOrders->count()}}
                                    </span>
                                    
                                </td>
                                
                                <td>
                                    <span class="label @if($pending_order->process_status ==  getNewId())
                                        label-danger
                                    @elseif($pending_order->process_status ==  getProcessedId())
                                        label-warning
                                    @endif">
                                        {{$pending_order->status->name}}
                                    </span>
                                    
                                </td>
                                <td>
                                    <a href="{{route('orders.show',['order'=>$pending_order->id])}}" class="btn btn-primary btn-rounded">
                                        <span class="fa fa-shopping-cart"></span>
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                                
            </div>
        </div>
        
    </div>
</div>

@endsection
