<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Session;
use Gate;

class PagesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }




public function edit($id)
{
  //if ( Gate::denies(['update_page'])  ) { abort(404); }
  $post  = Page::find($id);
  return view('backend.pages.pages.edit', compact('post')  );
}



public function update(Request $request, $id)
{
  //if ( Gate::denies(['update_page'])  ) { abort(404); }
  $page = Page::find($id);
  $page->content = $request->content;
  $page->intro = $request->intro;
  $page->save();

    Session::flash('msg', ' Updated ' );
    Session::flash('alert', 'success');
    return back();

  }


}
