<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function faqSections()
    {
        return $this->hasMany('App\FaqSection');
    }
}
