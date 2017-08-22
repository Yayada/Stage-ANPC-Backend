<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function faqSections()
    {
        return $this->hasMany('App\FaqSection');
    }

    public function questions()
    {
        return $this->hasManyThrough('App\FaqQuestion','App\FaqSection');
    }
}
