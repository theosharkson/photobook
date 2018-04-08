@extends('layouts.admin')

@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                           
    <li class="active">Frames</li>
</ul>
@endsection

@section('content')

<div class="row">
    <div class="col-md-5">
        
        <!-- START SALES BLOCK -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Frame</h3>
                    <span>Add a new frame</span>
                </div>                                     
                <ul class="panel-controls panel-controls-title">                                        
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a>
                    </li>
                </ul>                                    
                
            </div>
            <div class="panel-body">                                    
                
                <form action="{{route('frames.store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data"> 
                {{ csrf_field() }} 

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Frame Name</label>
                        <div class="col-md-9">
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


                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Frame Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="file-simple"/>

                            @if ($errors->has('image'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('image') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group{{ $errors->has('orientation') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Orientation</label>
                        <div class="col-md-9">
                            <select name="orientation" class="form-control select">
                                @foreach($orientations as $orientation)
                                    <option @if(old('orientation') == $orientation->id) selected @endif
                                    value="{{$orientation->id}}">{{$orientation->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('orientation'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('orientation') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Frame Size</label>
                        <div class="col-md-9">
                            <select name="size" class="form-control select">
                                @foreach($frame_sizes as $frame_size)
                                    <option @if(old('size') == $frame_size->id) selected @endif value="{{$frame_size->id}}">{{$frame_size->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('size'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('size') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('dimension') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Dimension</label>
                        <div class="col-md-9">
                            <input type="text" 
                            class="form-control"  
                            placeholder="Enter dimension here" 
                            name="dimension" 
                            value="{{old('dimension')}}">

                            @if ($errors->has('dimension'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('dimension') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Frame Price</label>
                        <div class="col-md-9">
                            
                            <div class="input-group">                                            
                                <span class="input-group-addon"> GH₵</span>
                                <input type="number" 
                                name="price" 
                                class="form-control" 
                                value="{{old('price')}}" 
                                placeholder="Enter price here">
                                <span class="input-group-addon">.00</span>
                            </div>

                            @if ($errors->has('price'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('price') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div> 


                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
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
                                Add Frame
                            </button>
                        </div>
                    </div> 

                </form>

            </div>
        </div>
        <!-- END SALES BLOCK -->
        
    </div>
    <div class="col-md-7">
        
        @include('admin.frames.all')
        
    </div>
</div>

@endsection

@section('scripts')
<script>
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: ".PNG"
            });             
        </script>
@endsection
