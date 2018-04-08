<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrameSize extends Model
{
    protected $fillable = [ 'name',
                            'dimension',
                            'description',
    					];
}
