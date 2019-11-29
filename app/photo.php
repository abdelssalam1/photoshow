<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $guarded = [];
    public function album()
    {
        return $this->belongsTo('App\album');
    }
}
