<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class worklinks extends Model
{
    protected $fillable = ['id', 'name', 'link', 'link_region', 'status'];
}
