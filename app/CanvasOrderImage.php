<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanvasOrderImage extends Model
{
    protected $fillable = [ 'image',
                            'code',
                            'priority',
                            'canvas_order_id',
    					];
}
