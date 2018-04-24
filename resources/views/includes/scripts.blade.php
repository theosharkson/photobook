<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 

<script src="{{asset('/js/plugins.js')}}"></script>             
<script src="{{asset('/js/scripts.js')}}"></script>  

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