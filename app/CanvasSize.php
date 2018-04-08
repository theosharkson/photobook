<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanvasSize extends Model
{
    protected $fillable = [ 'name',
                            'dimension',
                            'description',
    					];
}
