<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLocation extends Model
{
    protected $fillable = [ 'location',
                            'transportation_cost',
                            'description',
    					];
}
