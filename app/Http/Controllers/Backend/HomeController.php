<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $lang = null)
    {
      $lang = LangUser($lang);
      $posts = Post::latest()->get();
      return view('backend.pages.index' , compact('posts'));
    }




}
