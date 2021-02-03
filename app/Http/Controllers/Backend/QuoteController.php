<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quote;
use Session;
use Gate;

class QuoteController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($lang = null)
  {
     if ( Gate::denies('posts_list') ) { abort(404); }

$data = Quote::paginate(10);

return view('backend.pages.messages.index',compact('data') );

}


public function destroy($id)
{

  if ( Gate::denies('posts_delete')  ) { abort(404); }

  $user = Quote::find($id);
  $user->delete();
  Session::flash('msg', ' Deleted! ' );
  Session::flash('alert', 'danger');
  return back();

}





}
