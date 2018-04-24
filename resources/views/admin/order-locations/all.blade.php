<!-- START PROJECTS BLOCK -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>
                <span class="fa fa-map-marker"></span>
                Existing Locations
            </h3>
            <span>A list of all existing order locations.</span>
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
                        <th width="45%">Location</th>
                        <th width="15%">Transportaion Cost</th>
                        <th width="30%">Description</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_locations as $order_location)
                    <tr>
                        <td><strong>{{$order_location->location}}</strong></td>
                        <td><span class="label label-success">GH₵ {{$order_location->transportation_cost}}</span></td>
                        <td>{{$order_location->description}}</td>
                        <td>
                            <a class="btn btn-success btn-rounded" href="{{route('order-locations.edit',['orderLocation'=>$order_location->id])}}">
                              <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('order-locations.destroy',['orderLocation'=>$order_location->id])}}"
                              method="POST" class="form-horizontal"
                              onsubmit="return confirm('Are you sure you want to delete ({{$order_location->location}}) ?');">
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
            {{ $order_locations->links() }}
        </div>
    </div>
    
</div>

<!-- END PROJECTS BLOCK -->