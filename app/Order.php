<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'user_id',
                            'process_status',
                            'date',
                            'active_status',
                            'updated_by',
    					];
}
