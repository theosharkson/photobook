<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = [ 'order_id',
                            'amount',
                            'payment_method_id',
    					];
}
