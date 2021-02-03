<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
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


    public function index(Request $request , $category , $id , $title)
    {
        $post = Post::where('id', $id )->where('status', 1)->first();
        $related_posts = Post::where('id' , '!=', $id )
        ->where('status', 1)
        ->where('category',$post->category)
        ->take(3)->latest()->get();
        return view('frontend.pages.post',compact('post','related_posts'));
    }

    public function preview(Request $request , $category , $year , $month , $day , $id , $title)
    {
        $post = Post::where('id', $id )->first();
        $related_posts = Post::where('id' , '!=', $id )
        ->where('status', 1)->where('category',$post->category)->take(3)->latest()->get();

        if( $post->status == 1 ) {

            return redirect($post->path());

        }

        return view('frontend.pages.preview_post',compact('post','related_posts'));

    }





}
