<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqQuestion;
use App\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionsCount  =  FaqQuestion::all()->count();
        $notificationsCount = Notification::all()->count();

        return view('home',['questionsCount' => $questionsCount , 'notificationsCount' => $notificationsCount]);
    }
}
