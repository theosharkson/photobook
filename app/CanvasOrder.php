<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanvasOrder extends Model
{
    protected $fillable = [ 'order_id',
                            'canvas_id',
                            'quantity',
    					];
}
