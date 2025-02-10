<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    protected $table = 'chicken';

    protected $fillable = [
        'name',
        'uop_id',
    ];
}
