<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="#">Photo Books</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{asset('/admin-assets/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{asset('/admin-assets/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">John Doe</div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">
                    <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">Navigation</li>
        <li class="active">
            <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
        </li>                  
        <li class="xn-openable {{in_array(Request::route()->getName(), [
                              'frame-sizes.index',
                              'frame-sizes.edit',
                              'frame-sizes.create',
                              'frames.create',
                              'frames.edit',
                              'frames.index',
                              ]) ? 'active' : ''}}">
            <a href="#"><span class="fa fa-camera"></span> 
                <span class="xn-text">Frames</span>
            </a>
            <ul>
                <li class="{{in_array(Request::route()->getName(), [
                              'frame-sizes.index',
                              'frame-sizes.edit',
                              'frame-sizes.create',
                              ]) ? 'active' : ''}}">
                    <a href="{{route('frame-sizes.create')}}">
                        <span class="fa fa-arrows"></span> 
                        Frame Sizes
                    </a>
                </li>

                <li class="{{in_array(Request::route()->getName(), [
                              'frames.create',
                              'frames.edit',
                              ]) ? 'active' : ''}}">
                    <a href="{{route('frames.create')}}">
                        <span class="fa fa-camera"></span> 
                        All Frames
                    </a>
                </li>

            </ul>
        </li>


        <li class="xn-openable {{in_array(Request::route()->getName(), [
                              'orders.index',
                              'orders.pending',
                              'orders.show',
                              'order-locations.show',
                              'order-locations.create',
                              'order-locations.edit',
                              ]) ? 'active' : ''}}">
            <a href="#"><span class="fa fa-shopping-cart"></span> 
                <span class="xn-text">Orders</span>
            </a>
            <ul>
                <li class="{{in_array(Request::route()->getName(), [
                              'order-locations.show',
                              'order-locations.create',
                              'order-locations.edit',
                              ]) ? 'active' : ''}}">
                    <a href="{{route('order-locations.create')}}">
                        <span class="fa fa-map-marker"></span>
                        Order Locations
                    </a>
                </li>

                <li class="{{in_array(Request::route()->getName(), [
                              'orders.pending',
                              ]) ? 'active' : ''}}">
                    <a href="{{route('orders.pending')}}">
                        <span class="fa fa-dropbox"></span> 
                        Pending Orders
                    </a>
                </li>

                <li class="{{in_array(Request::route()->getName(), [
                              'orders.index',
                              ]) ? 'active' : ''}}">
                    <a href="{{route('orders.index')}}">
                        <span class="fa fa-shopping-cart"></span> 
                        All Orders
                    </a>
                </li>

            </ul>
        </li>

        

        
        
    </ul>
    <!-- END X-NAVIGATION -->
</div>