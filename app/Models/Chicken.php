<?php

namespace App\Models;

use App\Models\Scopes\ChickenScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([ChickenScope::class])]
class Chicken extends Model
{
    protected $table = 'chicken';

    protected $fillable = [
        'name',
        'uop_id',
    ];
}
