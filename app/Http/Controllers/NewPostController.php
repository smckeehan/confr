<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\Community;
use Input;
use DateTime;
use DB;

class NewPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
      if(!Auth::check()) {
        return Redirect::to('/login');
      }

      $community = NULL;

      if($id) {
          $community = Community::find($id);
      }

      return view('newpost', ['community' => $community, 'error' => NULL]);
    }

    public function noCommunity()
    {
      return $this->index(NULL);
    }

    public function validatePost($id) {
      if(!Auth::check()) {
        return Redirect::to('/login');
      }

      $error = NULL;

      $title = Input::get('title');
      $url = Input::get('url');
      $image = NULL;
      $description = Input::get('description');
      $newPostID = NULL;

      if(!empty($url) && preg_match("#https?://#", $url) == 0) {
          $url = 'http://'.$url;
      }

      if(empty($title)) {
        $error = 'Enter a title for your post';
      } else if(empty($description)) {
        $error = 'Enter a description for your post';
      } else {
        $newPost = ['title' => $title, 'description' => $description, 'url' => $url, 'community_id' => $id, 'user_id' => Auth::user()->id, 'comments_count' => 0, 'points' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime];
        $newPostID = DB::table('posts')->insertGetId($newPost);
      }

      if($error) {
        $community = Community::find($id);
        return view('newpost', ['community' => $community, 'error' => $error]);
      } else {
        return Redirect::to('/post/'.$newPostID);
      }
    }

    public function validatePostNoCommunity() {
      if(!Auth::check()) {
        return Redirect::to('/login');
      }

      if(!Input::get('community')) {
        return view('newpost', ['community' => NULL, 'error' => 'Enter a community ID (Sorry - this is temporary)']);
      }

      return $this->validatePost(Input::get('community'));
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
