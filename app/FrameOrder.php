<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrameOrder extends Model
{
    protected $fillable = [ 'order_id',
                            'frame_id',
                            'quantity',
    					];
}
}
