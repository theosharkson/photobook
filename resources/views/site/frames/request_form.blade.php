@extends('layouts.site')

@section('title')
Frames Homepage
@endsection


@section('content')

        <!-- Start Page Hero -->
        <section class="page-hero">
            <div class="page-hero-parallax">
                
                <div class="hero-image" style="background-image:url(img/portfolio/single-bg2.jpg)">
                     
                    <div class="hero-container container pt90">  
                        <div class="hero-content text-center scroll-opacity">
                            
                            <div class="section-heading">
                                <h5 class="white">Make Order</h5>  
                                <h2 class="white mt10">Picture Frames</h2> 
                            </div> 
                            
                            <ol class="project-changer">
                                <li>
                                    <a href="javascript::"><i class="ion-ios-arrow-thin-left size-2x"></i></a>
                                </li> 
                                <li>
                                    <a href="javascript::"><i class="ion-ios-more-outline size-2x"></i></a>
                                </li> 
                                <li>
                                    <a href="javascript::"><i class="ion-ios-arrow-thin-right size-2x"></i></a>
                                </li> 
                            </ol>
                        
                        </div> 
                    </div>  
                    
                </div> 
                
            </div>
        </section>
        <!-- End Page Hero -->

        <div class="site-wrapper fullwidth-md">  
            
            {{-- <!-- Start Image Left Wide -->
            <section class="pt40 pb40">
                <div class="container-fluid">
                    <div class="row-flex-center"> 
                        
                        <div class="co l-md-6 p0"> 
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
            <!-- End Image Left Wide --> --}}
            
            <!-- Start Image Right Wide -->
            <section class="bg-pattern-3">
                    <div class="container-fluid">
                        <div class="row-flex-center">  
                            
                            <div class="col-md-6 p0"> 
                                <div class="frame-image-container">
                                    
                                    {{-- <img id="frame-image-large" src="http://127.0.0.1:8000/uploads/frames_images_large/1522679474GT5646CWZQ.png" class="center-frame-image top-frame" alt="#">

                                    <img id="user-image" src="{{asset('img/trans.png')}}" class="back-image center-frame-image" alt="#">
     --}}
                                    <img id="frame-image-large" src="{{asset('img/trans.png')}}" class="frame-images top-frame" alt="#">

                                    <img id="user-image" src="{{asset('img/trans.png')}}" class="frame-images back-image" alt="#">

                                    
                                    

                                </div>
                                
                            </div>

                            <div class="col-md-6 mt40 mb40 product-feature-right">    
                                <h2 class="mb20"><small>Order Your Frame Today</small></h2>  
                                
                                <div id="available-frames">
                                    
                                </div>

                                
                                <div class="row">
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

                                                    <input id="product_image1" type="file" class="btn btn-primary btn-sm" name="product_image1" required=""   accept="image/*">

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
                                
                                </div>

                                <div class="row">
                                    <div class="col-sm-8">
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
                                    <div class="col-sm-4">
                                        <div id="frame_details" style="display: none;">
                                            <h5>Details</h5>
                                            <div class="details-container">
                                                <p>Orientation : <span id="details-orientation"></span> <span id="details-size"></span></p>
                                                <p>Dimension : <span id="details-dimension"></span></p>
                                                <p>Price : <span id="details-price"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <form action="{{route('frame-orders.store')}}" method="POST"  role="form" enctype="multipart/form-data"> 
                                    {{ csrf_field() }} 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-4 mt10">
                                                    Quantity
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="quantity ">
                                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <input type="hidden" id="frame_id" value="" name="frame_id">
                                            <input type="hidden" id="image_code" value="{{$image_code}}" name="image_code">

                                            <button type="submit" id="addToCart_Frame" class="btn btn-dark btn-lg btn-appear mt0"><span>Add To Cart <i class="ion-android-arrow-forward"></i></span></button>

                                        </div>
                                        
                                    </div>
                                </form>


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

    $(document).ready(function() {
        $('#addToCart_Frame').bind("click",function() 
        { 
            var imgVal = $('#product_image1').val(); 
            if(imgVal=='') 
            { 
                // alert("empty input file"); 
                toastr.warning('Please Uplaod an image!!.');
                return false; 
            } 


        }); 
    });


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

    function setAvailableFrameOrientations(frameid,ele) {
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
            
            var orientation_div = "<div onclick='setAvailableFrameSize("+a_orientation.id+",\""+current_frame.name+"\",this);setFrameOrientation(\""+current_frame.name+"\","+a_orientation.id+");' class='available-orientatiion "+orientation_class+"'><b>"+a_orientation.name+"</b></div>";
            console.log(orientation_div);
            $( "#available-orientations" ).append( orientation_div ).hide().show('slow');
        });

        $( "#frame_details" ).show();

        $('.frame-thumb').removeClass('frame-active');
        $(ele).addClass('frame-active');

        $( "#available-orientations div.available-orientatiion:first-child" ).click();


    }

    function setAvailableFrameSize(orientationid,frame_name,ele) {

        var all_same_frames_orientation  = frames.filter(function(temp_frame){
                return temp_frame.name == frame_name &&
                       temp_frame.orientation == orientationid;
            });

        // get the distinct Sizes
        var unique_frame_sizes = {};
        var distinct_frame_sizes = [];
        for( var i in all_same_frames_orientation ){

            if( typeof(unique_frame_sizes[all_same_frames_orientation[i].size]) == "undefined"){
        
                distinct_frame_sizes.push( getFrameSize(all_same_frames_orientation[i].size) );
            }
            unique_frame_sizes[all_same_frames_orientation[i].size] = 0;
        }


        $('.available-orientatiion').removeClass('active-Orientation');
        $(ele).addClass('active-Orientation');
        //Reset the div content
        $( "#available-sizes" ).html('');

        //Create the elements for the sizes
        current_available_sizes = distinct_frame_sizes;

       $.each(current_available_sizes, function( index, a_size ) {
            var size_div = "<div onclick='setFrameSize("+a_size.id+","+orientationid+",\""+frame_name+"\",this)' class='available-size'>"+a_size.name+"</div>";

            $( "#available-sizes" ).append( size_div ).hide().show('slow');
            
            
        });

       $( "#available-sizes div.available-size:first-child" ).click();


    }

    function setFrameSize(frame_size,orientationid,frame_name,ele){
        var cur_slected_frame  = frames.filter(function(temp_frame){
                return temp_frame.name == frame_name &&
                        temp_frame.size == frame_size &&
                       temp_frame.orientation == orientationid;
            })[0];

        $('#details-orientation').html(cur_slected_frame.frameorientation.name);
        $('#details-dimension').html(cur_slected_frame.dimension);
        $('#details-price').html( "GHS" + cur_slected_frame.price);
        $('#details-size').html(cur_slected_frame.framesize.name);
        $('#frame_id').val(cur_slected_frame.id);


        $('.available-size').removeClass('active-size');
        $(ele).addClass('active-size');

        var image = $("#frame-image-large");
        $('#user-image').fadeOut('fast');
        image.fadeOut('fast', function () {
            image.attr('src', large_image_path+cur_slected_frame.image);

            switch (frame_size) {
              case 1:
                $('#frame-image-large').css('max-width','150px');
                $('#user-image').css('margin-left','5px');
                break;
              case 2:
                $('#frame-image-large').css('max-width','220px');
                $('#user-image').css('margin-left','10px');
                break;
              case 3:
                $('#frame-image-large').css('max-width','300px');
                $('#user-image').css('margin-left','10px');
                break;
              case 4:
                $('#frame-image-large').css('max-width','360px');
                $('#user-image').css('margin-left','10px');
                break;
            };


            image.fadeIn('fast');
            $('#user-image').fadeIn('fast');
        });
        resizeUserImage();

    }


    function setFrameOrientation(frame_name, frame_orientation){
        
        var cur_slected_frame = frames.filter(function(c_frame){
            return c_frame.name == frame_name && 
                   c_frame.orientation == frame_orientation;
        })[0];

        var image = $("#frame-image-large");
        console.log(cur_slected_frame);
        console.log(image.height());

        // $('#details-orientation').html(cur_slected_frame.frameorientation.name);
        // $('#details-dimension').html(cur_slected_frame.dimension);
        // $('#details-price').html( "GHS" + cur_slected_frame.price);
        // $('#details-size').html(cur_slected_frame.framesize.name);
        // $('#frame_id').val(cur_slected_frame.id);


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
        if( resizeCount != 500 ){
            setTimeout(function() {
                $('.frame-image-container').height(($("#frame-image-large").height()+20));
                $('.frame-image-container').width(($("#frame-image-large").width()+20));
                $('#user-image').height(($("#frame-image-large").height()-10));
                $('#user-image').width(($("#frame-image-large").width()-10));
                resizeUserImage();
            },50);
        }else{
            resizeCount = 0;
        }
    }

    function deleteTempImage(image_id, image_input_ele,remove_btn) {
        var default_image_src = '{{url('/img/default-placeholder.png')}}'; //to load the image when page loads
        $.ajax({
            type:'GET',
            url: '{{url('delete-upload-userimage')}}/'+image_id,
            data:{},
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
//                console.log(data);
//                console.log(image_input_ele);
                $('#'+image_input_ele+'_preview').attr('src', default_image_src);
                $('#'+image_input_ele+'_lable').show();
                $(remove_btn).hide();
                
                var user_image = $("#user-image");
                user_image.fadeOut('fast', function () {
                    user_image.attr('src', '{{asset('img/trans.png')}}');
                    user_image.fadeIn('fast');
                });
                resizeUserImage();


            },
            error: function(data){
               console.log("error");
               console.log(data);
            }
        });
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
    
    

    // console.log(frames);
    // console.log(orientations);
    // console.log(frame_sizes);

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

        // console.log(frame);


        //Create the frames Image for selection.
        var image_div = "<div onclick='setAvailableFrameOrientations(\""+frame.id+"\",this); swapFrameImage(\""+large_image_path+frame.image+"\")' class='frame-thumb available-frame'>"+
                        " <img class='' src='"+thumnail_path+frame.image+"'>"+
                        "</div>";
        $( "#available-frames" ).append( image_div );
    });

    $( "#available-frames div.available-frame:first-child" ).click();


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
                    var image_code = $('#image_code').val();

                    var formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('code', image_code);
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
                                // $(input).val("");

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