@extends('layouts.admin')

@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                           
    <li class="active">Frame Sizes</li>
</ul>
@endsection

@section('content')

<div class="row">
    <div class="col-md-5">
        
        <!-- START SALES BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Frame Size</h3>
                    <span>Create a new frame size</span>
                </div>                                     
                <ul class="panel-controls panel-controls-title">                                        
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a>
                    </li>
                </ul>                                    
                
            </div>
            <div class="panel-body">                                    
                
                <form action="{{route('frame-sizes.store')}}" method="POST" class="form-horizontal" role="form"> 
                {{ csrf_field() }}                                   
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" 
                            class="form-control"  
                            placeholder="Enter name here" 
                            name="name" 
                            value="{{old('name')}}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group{{ $errors->has('dimension') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Dimension</label>
                        <div class="col-md-10">
                            <input type="text" 
                            class="form-control" 
                            placeholder=""
                            name="dimension" 
                            value="{{old('dimension')}}">
                            @if ($errors->has('dimension'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('dimension') }}</strong>
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
                                Add Size
                            </button>
                        </div>
                    </div> 

                </form>

            </div>
        </div>
        <!-- END SALES BLOCK -->
        
    </div>
    <div class="col-md-7">
        
        @include('admin.frame-sizes.all')
        
    </div>
</div>

@endsection
