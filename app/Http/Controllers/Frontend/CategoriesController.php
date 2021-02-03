<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Realestates;
class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */




    public function index(Request $request , $category  )
    {


        $posts = Post::where('status', 1 )
        ->where('category', $category )
        ->latest()->paginate(9);


        return view('frontend.pages.category',compact('posts'));
    }


    public function search(Request $request)
    {
        $title = $request->get('q');
        $find = $this->ar_query($request->get('q')) ;
        $posts = Post::whereRaw("title REGEXP '$find' ")->whereStatus(1)->latest()->paginate(9);
        return view( 'frontend.pages.category',compact('posts','title') );
    }

    public function tag(Request $request , $tag)
    {
        $title = str_replace( '-', ' ' , $tag );
        $find = $this->ar_query($title) ;
        $posts = Post::whereRaw("title REGEXP '$find' ")->whereStatus(1)->latest()->paginate(9);
        return view( 'frontend.pages.category',compact('posts','title') );
    }


}
