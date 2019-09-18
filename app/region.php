<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    protected $fillable = [
        'id',
        'work_id',
        'region',
    ];
}
