<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use DB;
use Auth;
use Redirect;
use Input;
use DateTime;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      if(!Auth::check()) {
        return Redirect::to('/login');
      }

      $messages = Message::where('receiver_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
      return view('inbox', ['messages' => $messages]);
    }

    public function viewMessage($id) {
      $message = Message::find($id);

      if(!Auth::check()) {
        return Redirect::to('/login');
      } else if(Auth::user()->id != $message->receiver_id) {
        return Redirect::to('/inbox');
      }

      DB::table('messages')->where('id', $id)->update(['read' => true]);
      return view('message', ['message' => $message]);
    }

    public function newMessage() {
      return view('newmessage', ['user' => NULL, 'error' => NULL]);
    }

    public function validateMessage() {
      $error = NULL;

      $user = Input::get('user');
      $subject = Input::get('subject');
      $message = Input::get('message');

      if(empty($subject)) {
        $error = 'Enter a message subject';
      } elseif(empty($message)) {
        $error = 'Enter a message';
      } else {
        $newMsg = ['sender_id' => Auth::user()->id, 'receiver_id' => $user, 'subject' => $subject, 'message' => $message, 'read' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime];
        $newMsgID = DB::table('messages')->insertGetId($newMsg);
      }

      if($error) {
        return view('newmessage', ['user' => NULL, 'error' => $error]);
      } else {
        return Redirect::to('/inbox');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
