<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'brand',
        'username',
    ];

    public $timestamps = false;
}
