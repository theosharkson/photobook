<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrameOrder extends Model
{
    protected $fillable = [ 'order_id',
                            'frame_id',
                            'quantity',
    					];

    protected $with = ['frame','UserImage'];
    					
    public function frame(){
	    return $this->belongsTo('App\Frame','frame_id');
	}

	public function UserImage(){
	    return $this->hasMany('App\FrameOrderImage','frame_order_id');
	}
}
