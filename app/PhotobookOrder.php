<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotobookOrder extends Model
{
    protected $fillable = [ 'order_id',
                            'photobook_id',
                            'quantity',
    					];
}
