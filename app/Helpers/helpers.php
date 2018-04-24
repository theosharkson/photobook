<?php


use App\Order;
use App\OrderLocation;
use App\ProcessStatus;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;


//generate random string
function generateRandomString($length) {
	$characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ123456789123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function daysOfweek(){
    return $days_of_week = [ 'Monday',
                             'Tuesday',
                             'Wednesday',
                             'Thursday',
                             'Friday',
                             'Saturday',
                             'Sunday'
                            ];
}

//generate random unique code
function getCode($model,$field){
    do{
        $rand = generateRandomString(8);
    }while(!empty($model::where($field,$rand)->first()));
    return $rand;
}


function save_image($image,$person_type,$update_image=0){
    ini_set('memory_limit','256M');
    // Add Product Images
    $Product_Image = $image;
    if($update_image != 0){
        $image_name = explode('.' ,$update_image )[0];
        $filename = $image_name.'.' . $Product_Image->getClientOriginalExtension();
    }else{
        $filename = date_timestamp_get(date_create()).generateRandomString(10).'.' . $Product_Image->getClientOriginalExtension();
    }
    $destination_path = base_path() . '/public/uploads/'.$person_type.'_images_raw/';
    $destination_actua_path = base_path() . '/public/uploads/'.$person_type.'_images/';
    $destination_actua_path_large = base_path() . '/public/uploads/'.$person_type.'_images_large/';
    $thumbnail_path = base_path() . '/public/uploads/'.$person_type.'_images_thumb/';

    if(!File::exists($destination_path)) {
	    File::makeDirectory($destination_path, $mode = 0777, true, true);
	}
	if(!File::exists($destination_actua_path)) {
	    File::makeDirectory($destination_actua_path, $mode = 0777, true, true);
	}
	if(!File::exists($destination_actua_path_large)) {
	    File::makeDirectory($destination_actua_path_large, $mode = 0777, true, true);
	}
	if(!File::exists($thumbnail_path)) {
	    File::makeDirectory($thumbnail_path, $mode = 0777, true, true);
	}


    $Product_Image->move($destination_path, $filename);

    $new_image = \Image::make($destination_path.$filename);
    $large_image = \Image::make($destination_path.$filename);
    $new_image_size = $new_image->filesize();
     if($new_image_size < 2000000){
        //Save the image with a 80% compression
        $new_image->save($destination_actua_path.$filename,80);
        $large_image->resize(460, null , function($ratio){$ratio->aspectRatio();})->save($destination_actua_path_large.$filename,90);
     }
     if(2000000 <= $new_image_size and $new_image_size <= 4000000){
        //Save the image with a 60% compression
        $new_image->save($destination_actua_path.$filename,50);
        $large_image->resize(460, null , function($ratio){$ratio->aspectRatio();})->save($destination_actua_path_large.$filename,70);

     }
     if(4000001 <= $new_image_size and $new_image_size <= 5000000){
        //Save the image with a 65% compression
        $new_image->save($destination_actua_path.$filename,35);
        $large_image->resize(460, null , function($ratio){$ratio->aspectRatio();})->save($destination_actua_path_large.$filename,65);
     }
     if(5000001 <= $new_image_size and $new_image_size <= 6000000){
        //Save the image with a 60% compression
        $new_image->save($destination_actua_path.$filename,30);
        $large_image->resize(460, null , function($ratio){$ratio->aspectRatio();})->save($destination_actua_path_large.$filename,55);
     }
     if(6000001 <= $new_image_size){
        //Save the image with a 50% compression
        $new_image->save($destination_actua_path.$filename,20);
        $large_image->resize(460, null , function($ratio){$ratio->aspectRatio();})->save($destination_actua_path_large.$filename,40);
     }

    // $new_image->fit(200)->save($thumbnail_path.$filename);
    $new_image->resize(150, null , function($ratio){$ratio->aspectRatio();})->save($thumbnail_path.$filename);

    return $filename;

}



function getCurrencyCode()
{
    return 'GHS';
    
}

function getDefaultPassword()
{
    return '123456';
    
}

function readableDate($date)
{
    return \Carbon\Carbon::parse($date)->toFormattedDateString();
    
}

function readableDateTime($date)
{
    return \Carbon\Carbon::parse($date)->toDayDateTimeString();
    
}



function defaultDate($date)
{
    return \Carbon\Carbon::parse($date)->format('d-m-Y');
    
}

function dbDate($date)
{
    return DateTime::createFromFormat('d-m-Y',$date);
    
}

function formatDateForDb($date)
{
   return \Carbon\Carbon::parse($date)->format('Y-m-d h:m:s'); 
}

function getRandomColor()
{
    $array = [
                'gray',
                'navy',
                'teal',
                'aqua',
                'orange',
                'maroon',
                'black',
                'yellow',
                'green',
            ];

    $random = array_random($array);
    return $random;
    
}


function getTempId()
{
    $record = ProcessStatus::where('name','Temp')->first();
    if(!empty($record)){
        return $record->id;
    }else{
        return 1;
    }
}

function getPaymentId()
{
    $record = ProcessStatus::where('name','Payment')->first();
    if(!empty($record)){
        return $record->id;
    }else{
        return 1;
    }
}


function getNewId()
{
    $record = ProcessStatus::where('name','New')->first();
    if(!empty($record)){
        return $record->id;
    }else{
        return 1;
    }
}

function getProcessingId()
{
    $record = ProcessStatus::where('name','Processing')->first();
    if(!empty($record)){
        return $record->id;
    }else{
        return 1;
    }
}

function getProcessedId()
{
    $record = ProcessStatus::where('name','Processed')->first();
    if(!empty($record)){
        return $record->id;
    }else{
        return 1;
    }
}

function getDeliveredId()
{
    $record = ProcessStatus::where('name','Delivered')->first();
    if(!empty($record)){
        return $record->id;
    }else{
        return 1;
    }
}



function getProcessingOrders()
{
   return $processing_orders = Order::where('user_id',Auth::id())
                              ->where('process_status','<>', getPendingId() )
                              ->where('process_status','<>', getDeliveredId() )
                              ->get();
}


function getAdminRoleId()
{
    $role = UserType::where('name','Admin')->first();
    if(!empty($role)){
        return $role->id;
    }else{
        return null;
    }
}

function getCustomerRoleId()
{
    $role = UserType::where('name','Customer')->first();
    if(!empty($role)){
        return $role->id;
    }else{
        return null;
    }
}



function getDefaultLocationId()
{
    $location = OrderLocation::where('location','OUR OFFICE')->first();
    if(!empty($location)){
        return $location->id;
    }else{
        return null;
    }
}





?>