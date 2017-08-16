<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqSection extends Model
{
    public function faq()
    {
        return $this->belongsTo('App\Faq');
    }
    
    public function faqQuestions()
    {
        return $this->hasMany('App\FaqQuestion');
    }
}
