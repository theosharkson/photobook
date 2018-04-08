
<!-- START PLUGINS -->
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/jquery/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src="{{asset('/admin-assets/js/plugins/icheck/icheck.min.js')}}"></script>        
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/morris/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/morris/morris.min.js')}}"></script>       
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/rickshaw/d3.v3.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
<script type='text/javascript' src="{{asset('/admin-assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script type='text/javascript' src="{{asset('/admin-assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
<script type='text/javascript' src="{{asset('/admin-assets/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/owl/owl.carousel.min.js')}}"></script>                 

<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- END THIS PAGE PLUGINS-->        

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{asset('/admin-assets/js/settings.js')}}"></script>

<script type="text/javascript" src="{{asset('/admin-assets/js/plugins.js')}}"></script>        
<script type="text/javascript" src="{{asset('/admin-assets/js/actions.js')}}"></script>

<script type="text/javascript" src="{{asset('/admin-assets/js/demo_dashboard.js')}}"></script>
<!-- END TEMPLATE -->

<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/fileinput/fileinput.min.js')}}"></script>

<script type="text/javascript" src="{{asset('/admin-assets/js/plugins/bootstrap/bootstrap-select.js')}}"></script>

<script src="{{asset('/admin-assets/assets/plugins/toastr/toastr.js')}}"></script>

<script>
            
        // Display Success messages
        @if(session()->has('success_message'))
            toastr.success('{{ session()->get('success_message') }}');
        @endif

        // Display Error messages
        @if(session()->has('error_message'))
            toastr.error('{{ session()->get('error_message') }}');
        @endif

        // Display Error messages
        @if(session()->has('warning_message'))
            toastr.warning('{{ session()->get('warning_message') }}');
        @endif

        // Display Error messages
        @if(session()->has('info_message'))
            toastr.info('{{ session()->get('info_message') }}');
        @endif


    </script>