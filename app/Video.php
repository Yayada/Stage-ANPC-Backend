<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function rubrique()
    {
        return $this->belongsTo('App\Rubrique');
    }
}
