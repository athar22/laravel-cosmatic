<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Quote;
use App\Post;
use App\Page;
class HomeController extends Controller
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


    public function index()
    {
        $silder = Post::whereStatus(1)
        ->orderBy('order_list' , 'asc')
        ->where('category','slider')
        ->get();



        $services = Post::whereStatus(1)
        ->orderBy('order_list' , 'asc')
        ->take(10)
        ->where('category','services')
        ->get();


        $products = Post::whereStatus(1)
        ->orderBy('order_list' , 'asc')
        ->take(4)
        ->where('category','products')
        ->get();


        $projects = Post::whereStatus(1)
        ->orderBy('order_list' , 'asc')
        ->take(10)
        ->where('category','projects')
        ->get();

        $clients = Post::whereStatus(1)
        ->orderBy('order_list' , 'asc')
        ->take(20)
        ->where('category','clients')
        ->get();


        $total_products = Post::whereStatus(1)
        ->where('category','products')
        ->count();
        $total_services = Post::whereStatus(1)
        ->where('category','services')
        ->count();
        $total_projects = Post::whereStatus(1)
        ->where('category','projects')
        ->count();


        return view('frontend.pages.index',compact('silder','services','products','total_products','total_projects','total_services','projects','clients'));
    }




    public function page($title)
    {

$page = Page::wherePage($title)->first();

return view('frontend.pages.page',compact('page'));

    }



public function contact()
{

return view('frontend.pages.contact');

}


public function quote( Request $request )
    {

        $quote = new Quote;
        $quote->name = $request->name;
        $quote->email = $request->email;
        $quote->phone = $request->phone;
        $quote->message = $request->message;
        $quote->save();


        Session::flash('msg', ' sent! ' );
        Session::flash('alert', 'success');
        return back();
    }

}
