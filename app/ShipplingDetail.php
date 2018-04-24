<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipplingDetail extends Model
{
    protected $fillable = [ 'name',
                            'email',
                            'phone_number',
                            'notes',
                            'order_id',
    					];
}
