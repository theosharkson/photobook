<!-- START PROJECTS BLOCK -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>Existing Sizes</h3>
            <span>A list of all existing frame sizes.</span>
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
                        <th width="45%">Name</th>
                        <th width="15%">Dimension</th>
                        <th width="30%">Description</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($frame_sizes as $frame_size)
                    <tr>
                        <td><strong>{{$frame_size->name}}</strong></td>
                        <td><span class="label label-info">{{$frame_size->dimension}}</span></td>
                        <td>{{$frame_size->description}}</td>
                        <td>
                            <a class="btn btn-success btn-rounded" href="{{route('frame-sizes.edit',['frameSize'=>$frame_size->id])}}">
                              <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('frame-sizes.destroy',['frameSize'=>$frame_size->id])}}"
                              method="POST" class="form-horizontal"
                              onsubmit="return confirm('Are you sure you want to delete ({{$frame_size->name}}) ?');">
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

    <div class="row">
        <div class="col-sm-12">
            {{ $frame_sizes->links() }}
        </div>
    </div>
    
</div>

<!-- END PROJECTS BLOCK -->