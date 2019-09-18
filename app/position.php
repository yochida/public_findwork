<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $fillable = [
        'id',
        'work_id',
        'position',
        'detail',
        'salary',
        'amount',
    ];
}
