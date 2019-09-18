<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $fillable = [
        'id',
        'work_id',
        'province',
    ];
}
