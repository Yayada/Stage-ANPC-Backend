<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Notification;
use App\User;
use Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::with('user')->get();

        return view('notifications/all',['notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $body =  $request->input('body');

        $data = json_encode( array(
                "notification" => [
                        "title"=>$title,
                        "body"=>$body,
                        "sound"=>"default",
                        "click_action"=>"FCM_PLUGIN_ACTIVITY",
                        "icon"=>"fcm_push_icon"
                    ],
                "data" => [
                    "paramBody" => $body,
                ],
                "to"=>"/topics/marketing",
                "priority"=>"high",
        ));

        $client = new Client();

        $req = $client->post('https://fcm.googleapis.com/fcm/send',array(
                'headers' => array(
                    'content-type' => 'application/json',
                    'Authorization'=> 'key=AIzaSyBmmppXjda5Liq6nwYHDau9mws0VRGlYdk'),
                'body' => $data)
                );

        $user = User::find(Auth::id());

        $notification = new Notification;
        $notification->title = $title;
        $notification->body = $body;
        $notification->user_id = Auth::id();
        $user->notifications()->save($notification);

        return redirect()->route('notifications.index');               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
