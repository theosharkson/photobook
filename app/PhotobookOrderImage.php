<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotobookOrderImage extends Model
{
    protected $fillable = [ 'image',
                            'code',
                            'priority',
                            'photobook_order_id',
    					];
}
