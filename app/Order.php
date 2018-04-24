<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'user_id',
                            'process_status',
                            'date',
                            'active_status',
                            'updated_by',
                            'order_locations_id',
    					];

    protected $with = ['frameOrders','photobookOrders','canvasOrders','status','orderLocation'];
    
    public function frameOrders(){
	    return $this->hasMany('App\FrameOrder','order_id');
	}

	public function photobookOrders(){
	    return $this->hasMany('App\PhotobookOrder','order_id');
	}

	public function canvasOrders(){
	    return $this->hasMany('App\CanvasOrder','order_id');
	}

	public function user(){
	    return $this->belongsTo('App\User','user_id');
	}

	public function status(){
	    return $this->belongsTo('App\ProcessStatus','process_status');
	}

	public function orderLocation(){
	    return $this->belongsTo('App\OrderLocation','order_locations_id');
	}



}

