<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    protected $fillable = [ 'name',
                            'orientation',
                            'size',
                            'image',
                            'price',
                            'description',
                            'updated_by',
    					];
}
