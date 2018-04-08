<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    protected $fillable = [ 'name',
                            'orientation',
                            'size',
                            'dimension',
                            'image',
                            'price',
                            'description',
                            'updated_by',
    					];

    protected $with = ['framesize','frameorientation'];
	
	public function framesize(){
	    return $this->belongsTo('App\FrameSize','size');
	}

	public function frameorientation(){
	    return $this->belongsTo('App\Orientation','orientation');
	}
}
