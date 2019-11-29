<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $guarded = [];
    public function photos()
    {
        return $this->hasMany('App\photo');
    }
}
