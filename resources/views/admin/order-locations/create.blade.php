@extends('layouts.admin')

@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                           
    <li class="active">Order Locations</li>
</ul>
@endsection

@section('content')

<div class="row">
    <div class="col-md-5">
        
        <!-- START SALES BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3><span class="fa fa-map-marker"></span> Order Locations</h3>
                    <span>Add a new location</span>
                </div>                                     
                <ul class="panel-controls panel-controls-title">                                        
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a>
                    </li>
                </ul>                                    
                
            </div>
            <div class="panel-body">                                    
                
                <form action="{{route('order-locations.store')}}" method="POST" class="form-horizontal" role="form"> 
                {{ csrf_field() }}                                   
                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Location Name</label>
                        <div class="col-md-10">
                            <input type="text" 
                            class="form-control"  
                            placeholder="Enter location here" 
                            name="location" 
                            value="{{old('location')}}">

                            @if ($errors->has('location'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('location') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group{{ $errors->has('transportation_cost') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Cost</label>
                        <div class="col-md-10">
                            <div class="input-group">                                            
                                <span class="input-group-addon"> GH₵</span>
                                <input type="transportation_cost" 
                                name="transportation_cost" 
                                class="form-control" 
                                value="{{old('transportation_cost')}}" 
                                placeholder="Enter price here">
                                <span class="input-group-addon">.00</span>
                            </div>

                            @if ($errors->has('transportation_cost'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('transportation_cost') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div> 


  

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fa fa-plus"></i>
                                Add Location
                            </button>
                        </div>
                    </div> 

                </form>

            </div>
        </div>
        <!-- END SALES BLOCK -->
        
    </div>
    <div class="col-md-7">
        
        @include('admin.order-locations.all')
        
    </div>
</div>

@endsection
