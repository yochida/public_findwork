<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    protected $fillable = [
        'id',
        'topic',
        'register_detail',
        'start_date',
        'finish_date',
        'announce',
        'user_id',
        'link',
        'status',
    ];

    public function position()
    {
        return $this->hasMany('App\position', 'work_id', 'id');
    }

    public function province()
    {
        return $this->hasMany('App\province', 'work_id', 'id');
    }

    public function region()
    {
        return $this->hasMany('App\region', 'work_id', 'id');
    }
}
