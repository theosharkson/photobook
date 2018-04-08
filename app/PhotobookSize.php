<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotobookSize extends Model
{
    protected $fillable = [ 'name',
                            'dimension',
                            'description',
    					];
}
