<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
