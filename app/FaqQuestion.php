<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    public function faqSection()
    {
        return $this->belongsTo('App\FaqSection');
    }
}
