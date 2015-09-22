<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Post;
use App\Community;
use Input;
use DB;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check()) {
          $skip = Input::get('p') * 10;

          $posts = Post::orderBy('points','desc')->take(10)->skip($skip)->get();
          return view('newsfeed', ['posts' => $posts]);
        } else {
          return view('splash', ['submitted' => FALSE]);
        }
    }

    public function emailCheck() {
      $domain = substr(strrchr(Input::get('emailCheck'), "@"), 1);

      $query = DB::table('instances')->where('tld',$domain)->get();

      $success = FALSE;
      $msg = 'Unfortunately, your school is not supported at this time. Check back soon!';

      if($query) {
        $success = TRUE;
        $msg = 'Congratulations! Your school is supported. <a href="/register">Click to register!</a>';
      }

      return view('splash', ['submitted' => TRUE, 'success' => $success, 'msg' => $msg]);
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
