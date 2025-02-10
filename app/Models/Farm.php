<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $table = 'farm';

    protected $fillable = [
        'name',
        'uop_id',
    ];
}
