<!-- START PROJECTS BLOCK -->
<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>Existing Frames</h3>
            <span>A list of all existing frames.</span>
        </div>                                    
        <ul class="panel-controls" style="margin-top: 2px;">
            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a>
            </li>                                   
        </ul>
    </div>
    <div class="panel-body panel-body-table">
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="4%"></th>
                        <th width="30%">Name</th>
                        <th width="5%">Size</th>
                        <th width="15%">Orientation</th>
                        <th width="15%">Dimention</th>
                        <th width="20%">Price</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($frames as $frame)
                    <tr>
                        <td><img src="{{route('frames.images.thumb',['image'=>$frame->image]) }}"></td>
                        <td>{{$frame->name}}</td>
                        <td>{{$frame->framesize->name}}</td>
                        <td>{{$frame->frameorientation->name}}</td>
                        <td>{{$frame->dimension}}</td>
                        <td>GH₵ {{$frame->price}}</td>
                        <td>
                            <a class="btn btn-success btn-rounded" href="{{route('frames.edit',['frameSize'=>$frame->id])}}">
                              <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('frames.destroy',['frameSize'=>$frame->id])}}"
                              method="POST" class="form-horizontal"
                              onsubmit="return confirm('Are you sure you want to delete ({{$frame->name}}) ?');">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                
                                <button type="submit" class="btn btn-danger btn-rounded">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-sm-12">
        {{ $frames->links() }}
    </div>
</div>

<!-- END PROJECTS BLOCK -->