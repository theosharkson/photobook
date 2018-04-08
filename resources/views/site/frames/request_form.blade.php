@extends('layouts.site')

@section('title')
Frames Homepage
@endsection


@section('content')
        <!-- Hero -->
        <section class="hero-fullwidth hero-product-showcase">
            <div class="hero-parallax-fullwidth">
                
                <div class="hero-image bg-product-1">
                     
                    <div class="hero-container container">  
                        <div class="hero-content scroll-opacity">  
                            <div class="appear container text-center pt40">
                                <h5 class="subheading white">Get your photobook</h5>
                                <img src="img/product/product-logo.png" class="width100">
                                <h3 class="white mt5 scroll-opacity">
                                    <small>
                                        This is where music starts playing!
                                        <br>Perfect sound from ear to ear.
                                    </small>
                                </h3>      
                                <a href="#" class="btn btn-primary btn-md btn-appear scroll-opacity mt40"><span>Pre-Order Now <i class="ion-android-arrow-forward"></i></span></a> 
                            </div>
                        </div> 
                    </div> 
                    
                </div> 
                
            </div>
        </section>
        <!-- End Hero -->  
        
        <div class="site-wrapper fullwidth-md">  
            
            <!-- Start Image Left Wide -->
            <section class="pt40 pb40">
                <div class="container-fluid">
                    <div class="row-flex-center"> 
                        
                        <div class="col-md-6 p0"> 
                            <img src="img/product/feature1.jpg" class="img-responsive width100" alt="#">
				        </div>
                        
                        <div class="col-md-6 mt40 mb40 text-left product-feature-left">    
                            <h2 class="mb20"><small>Built for endurance!</small></h2>    
                            <p class="mt20">Nam ei eros consul omnesque, suscipiantur contentiones est cu. Aliquam perfecto ex usu. Docendi urbanitas cu eos, cu semper scripta cumaases. Pro ea minim graeci dissentiunt. Solum aeque electram in has, mel autem libris cu. Solum aeque electram in has, mel autem libris cu. Nam ei eros consul omnesque.</p>   
                            <p>Solum aeque electram in has, mel autem libris cu. Nam ei eros consul omnesque, suscipiantur contentiones est cu.</p>
				        </div>  
                        
                    </div>
                </div>
            </section>
            <!-- End Image Left Wide -->
            
            <!-- Start Image Right Wide -->
            <section class="bg-pattern-3">
                <div class="container-fluid">
                    <div class="row-flex-center">  
                        
                        <div class="col-md-6 p0"> 
                            <div class="frame-image-large">
                                
                                <img id="frame-image-large" src="http://127.0.0.1:8000/uploads/frames_images_large/1522679474GT5646CWZQ.png" class="center-frame-image top-frame" alt="#">

                                <img id="user-image" src="{{asset('img/trans.png')}}" class="back-image center-frame-image" alt="#">

                                
                                

                            </div>
                            
                        </div>

                        <div class="col-md-6 mt40 mb40 product-feature-right">    
                            <h2 class="mb20"><small>Order Your Frame Today</small></h2>  
                            
                            <div id="available-frames">
                                
                            </div>

                            
                            <div class="row">
                                <form>
                                <div class="col-md-12 user-upload-section" id="product_images">
                                    
                                    <div class="product-image">
                                        <div class="row product-image-row" >
                                            
                                            <div class="col-xs-12 col-sm-4 ">
                                                <img id="product_image1_preview" class="prod-img" src="{{url('/img/default-placeholder.png')}}" style="max-width:120px;" width="120px" alt="your image" />
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-8 prod-img-details">
                                                
                                                <label for="product_image1" id="product_image1_lable" class="custom-file-upload">
                                                   <i class="fa fa-cloud-upload"></i> Upload Image
                                                </label>

                                                <input id="product_image1" type="file" class="btn btn-primary btn-sm" name="product_image1"   accept="image/*">

                                                <div id="product_image1_uploading" style="display:none">
                                                    <img  src="{{url('/img/loading.gif')}}" style="max-width:50px;" width="50px" alt="your image" />
                                                    <p id="product_image1_uploading_text">Uploading <span id="product_image1_uploading_percentage"></span></p>
                                                    <p id="product_image1_processing_text"  style="display:none;">Processing...</p>
                                                </div>

                                                <div id="product_image1_delete_section" style="display:none">

                                                </div>


                                                <div class="alert alert-danger" id="product_image1_errors" style="display:none">
                                                    <ul></ul>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                            </div>

                            <div class="dinamic-filters">

                                <div class="row">
                                    <div id="available-orientations">
                                    
                                    </div>
                                </div>


                                <div class="row">
                                    <div id="available-sizes">
                                    
                                    </div>
                                </div>

                            </div>
                            
                            

                            



				        </div>  
                        
                    </div>
                </div>
            </section>
            <!-- End Image Right Wide -->   
            
            
        	<!-- End Call to Action -->  
            
            <!-- Start Back To Top -->
            <a id="back-to-top"><i class="icon ion-chevron-up"></i></a>
            <!-- End Back To Top -->
            
        </div><!-- Site Wrapper -->
@endsection

@section('scripts')
<script type="text/javascript">

    var frames = {!! $frames !!};
    var orientations = {!! $orientations !!};
    var frame_sizes = {!! $frame_sizes !!};
    var thumnail_path = "{{route('frames.images.thumb_path')}}/";
    var large_image_path = "{{route('frames.images.large_path')}}/";

    var uploaded_image_path = "{{route('frame_orders.images.large_path')}}/";
    var image = "";

    var availableFrames;
    var current_available_orientations;
    var current_available_sizes;

    var selected_frame_name;
    var selected_feame_orientation;
    var selected_frame_size;



    function swapFrameImage(image_url){

        var image = $("#frame-image-large");
        $('#user-image').fadeOut('fast');
        image.fadeOut('fast', function () {
            image.attr('src', image_url);
            image.fadeIn('fast');
            $('#user-image').fadeIn('fast');
        });
        resizeUserImage();
    }

    function getOrientation(id) {
        orientation  = orientations.filter(function(temp_orientation){
            return temp_orientation.id == id;
        });

        if(orientation.length > 0 ){
            return orientation[0];
        }else{
            return null;
        }
    }

    function getFrameSize(id) {
        frame_size  = frame_sizes.filter(function(temp_frame_size){
            return temp_frame_size.id == id;
        });

        if(frame_size.length > 0 ){
            return frame_size[0];
        }else{
            return null;
        }
    }

    function setAvailableFrameOrientations(frameid) {
        //Reset the div content
       $( "#available-orientations" ).html('');
       $( "#available-sizes" ).html('');

        var current_frame = availableFrames.filter(function(availableFrame){
            return availableFrame.id == frameid;
        })[0];

        current_available_orientations = current_frame.available_orientaions;

         $.each(current_available_orientations, function( index, a_orientation ) {
            
            var orientation_class;
            if(a_orientation.name == "Landscape"){
                orientation_class = 'landscape';
            }else if(a_orientation.name == "Portrait"){
                orientation_class = 'portrait';
            }else if(a_orientation.name == "Square"){
                orientation_class = 'square';
            }
            
            var orientation_div = "<div onclick='setAvailableFrameSize("+a_orientation.id+",this);setFrameOrientation(\""+current_frame.name+"\","+a_orientation.id+");' class='available-orientatiion "+orientation_class+"'><b>"+a_orientation.name+"</b></div>";
            console.log(orientation_div);
            $( "#available-orientations" ).append( orientation_div ).hide().show('slow');
        });


    }

    function setAvailableFrameSize(orientationid,ele) {
        $('.available-orientatiion').removeClass('active-Orientation');
        $(ele).addClass('active-Orientation');
        //Reset the div content
        $( "#available-sizes" ).html('');

        current_available_sizes = current_available_orientations.filter(function(availableOrientation){
            return availableOrientation.id == orientationid;
        })[0].available_sizes;

       $.each(current_available_sizes, function( index, a_size ) {
            var size_div = "<div onclick='' class='available-size'>"+a_size.name+"</div>";

            $( "#available-sizes" ).append( size_div ).hide().show('slow');
            
            
        });


    }


    function setFrameOrientation(frame_name, frame_orientation){
        
        var cur_slected_frame = frames.filter(function(c_frame){
            return c_frame.name == frame_name && 
                   c_frame.orientation == frame_orientation;
        })[0];

        var image = $("#frame-image-large");
        console.log(cur_slected_frame);
        console.log(image.height());


        $('#user-image').fadeOut('fast');
        image.fadeOut('fast', function () {
            image.attr('src', large_image_path+cur_slected_frame.image);
            image.fadeIn('fast');
            $('#user-image').fadeIn('fast');
        });
        resizeUserImage();

    }

    var resizeCount = 0;
    function resizeUserImage() {
        if( resizeCount != 100 ){
            setTimeout(function() {
                $('#user-image').height(($("#frame-image-large").height()-20));
                $('#user-image').width(($("#frame-image-large").width()-20));
                resizeUserImage();
            },200);
        }
    }


(function($) {
    // $("#frames-slider").owlCarousel({
    //     autoPlay : false,
    //     items: 6, 
    //     pagination: false,
    //     navigation: true,
    //     navigationText: [
    //        "<i class='fa fa-chevron-left'></i>",
    //        "<i class='fa fa-chevron-right'></i>"
    //     ]
    // });
    
    

    console.log(frames);
    console.log(orientations);
    console.log(frame_sizes);

    //Fetch Distinct Frames
    var flags = {};
    availableFrames = frames.filter(function(entry) {
        if (flags[entry.name]) {
            return false;
        }
        flags[entry.name] = true;
        return true;
    });

    console.log(availableFrames);

    // Create the thumbnail images of the frames
    $.each(availableFrames, function( index, frame ) {
        
        //Get the available Orientations fro the current frame
        var all_same_frames  = frames.filter(function(temp_frame){
            return temp_frame.name == frame.name;
        });
        //get the distinct orientations
        var unique_orientations = {};
        var distinct_orientations = [];
        for( var i in all_same_frames ){
            if( typeof(unique_orientations[all_same_frames[i].orientation]) == "undefined"){
                distinct_orientations.push( getOrientation(all_same_frames[i].orientation) );
            }
            unique_orientations[all_same_frames[i].orientation] = 0;
        }
        //Set the available orientations fro this frame
        frame['available_orientaions'] = distinct_orientations;

        $.each(frame.available_orientaions, function( index, available_orientaion ) {
            //Get the available sizes for each orientation
            var all_same_frames_orientation  = frames.filter(function(temp_frame){
                return temp_frame.name == frame.name &&
                       temp_frame.orientation == available_orientaion.id;
            });
            //get the distinct orientations
            var unique_frame_sizes = {};
            var distinct_frame_sizes = [];
            for( var i in all_same_frames_orientation ){
                if( typeof(unique_frame_sizes[all_same_frames_orientation[i].size]) == "undefined"){
                    distinct_frame_sizes.push( getFrameSize(all_same_frames_orientation[i].size) );
                }
                unique_frame_sizes[all_same_frames_orientation[i].size] = 0;
            }

            available_orientaion['available_sizes'] = distinct_frame_sizes;


        });
        

        console.log(frame);


        //Create the frames Image for selection.
        var image_div = "<div onclick='setAvailableFrameOrientations(\""+frame.id+"\"); swapFrameImage(\""+large_image_path+frame.image+"\")' class='frame-thumb'>"+
                        " <img class'center-frame-image' src='"+thumnail_path+frame.image+"'>"+
                        "</div>";
        $( "#available-frames" ).append( image_div );
    });


        function initialize_image_input(input_id) {

            $("#"+input_id).on('change', function(event) {
                //console.log("change");
                //hide the input element
                $(this).hide();
                $("#"+input_id+'_lable').hide();
                //show the uploading gif
                $("#"+input_id+'_uploading').show();
                $("#"+input_id+'_uploading_text').show();
                $("#"+input_id+'_processing_text').hide();

                //hide the error div if its showing
                $("#"+input_id+'_errors').css('display','none');
                $('#Submitbutton').hide();
                ProccessImage(this,input_id+'_preview',input_id);
            });

        }

        function ProccessImage(input,image_id,input_id) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+image_id).attr('src', e.target.result);
                };

                reader.onloadend = function(e) {
                    //Send the ajax form
                    var form = document.querySelector('form');
                    var product_image_code = $('#product_image_code').val();

                    var formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('product_image_code', product_image_code);
                    formData.append('image_input', input_id);
                    formData.append(input_id, input.files[0]);
                    formData.append('image', input.files[0]);
                   console.log(formData)
                    $.ajax({
                        type:'POST',
                        url: '{{route('frame-order-images.store')}}',
                        xhr: function() {
                            var xhr = $.ajaxSettings.xhr();
                            xhr.upload.onprogress = function(e) {
                                var percentage_raw = Math.floor(e.loaded / e.total *100);
                                var percentage = Math.floor(e.loaded / e.total *100) + '%';
                                //Display Upload Process
                                $("#"+input_id+'_uploading_percentage').html(percentage);
                                if(percentage_raw == 100){
                                    $("#"+input_id+'_uploading_text').hide();
                                    $("#"+input_id+'_uploading_percentage').html('0%');
                                    $("#"+input_id+'_processing_text').show();
                                }
                            };
                            return xhr;
                        },
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(data){
                           console.log(data);
                            $('#Submitbutton').show();
                            if($.isEmptyObject(data.error)){

                                //Get the image
                                user_image_url = uploaded_image_path+data.image;
                                console.log(image);
                                //set the uer image
                                var user_image = $("#user-image");
                                user_image.fadeOut('fast', function () {
                                    user_image.attr('src', user_image_url);
                                    user_image.fadeIn('fast');
                                });
                                resizeUserImage();


                                //hide the uploading gif
                                $("#"+input_id+'_uploading').hide();
                                $(input).val("");

                                $("#"+input_id+'_delete_section').html($(`<a href="javascript:void(0)"
                                                                            id="`+input_id+`_remove"
                                                                            onclick="deleteTempImage(`+data.product_image_id+`,'`+input_id+`',this);"
                                                                            class="btn btn-danger pull-right">
                                                                                <i class="fa fa-times" aria-hidden="true"></i> Remove
                                                                            </a>`) ).show();

                                //Add the next image input only if the uploaded once is 0
                                if($("#"+input_id+'_uploaded_once').val() == 0){
                                    if($('.product-image').length <= 3){
                                        var next_ele_id = $('.product-image').length +1;
                                        product_images_container.append( $(createImageDiv( next_ele_id ) ) );
                                        initialize_image_input('product_image'+next_ele_id);
                                    }
                                }
                                //increment the uploaded once value
                                $("#"+input_id+'_uploaded_once').val(1);

    //                            console.log('Image Upload Successfully.');
                            }else{
                                printErrorMsg(data.error, input_id+'_errors');

                                //show the input element
                                $(input).show();
                                //hide the uploading gif
                                $("#"+input_id+'_uploading').hide();
                            }
                        },
                        error: function(data){
    //                        console.log("error");
    //                        console.log(data);

                            //show the input element
                            $(input).show();
                            //hide the uploading gif
                            $("#"+input_id+'_uploading').hide();
                        }
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function printErrorMsg (msg,ele) {
            $("#"+ele).find("ul").html('');
            $("#"+ele).css('display','block');
            $.each( msg, function( key, value ) {
                $("#"+ele).find("ul").append('<li>'+value+'</li>');
            });
        }


    initialize_image_input('product_image1');




})(jQuery);
</script>
@endsection