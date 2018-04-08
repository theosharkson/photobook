<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrameOrderImage extends Model
{
    protected $fillable = [ 'image',
                            'code',
                            'priority',
                            'frame_order_id',
    					];
}
