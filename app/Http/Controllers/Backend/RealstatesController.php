<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realestates;
use Session;
use Gate;

class RealstatesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

public function index(  )
{
    if ( Gate::denies('realestates')  ) { abort(404); }
    $data = Realestates::orderby('status','asc')->paginate(10);
    return view('backend.pages.realestates.index', compact('data')  );
}



public function destroy($id)
{

    if ( Gate::denies('realestates')  ) { abort(404); }
    $user = Realestates::find($id);
    $user->delete();
    Session::flash('msg', ' Deleted! ' );
    Session::flash('alert', 'danger');
    return back();

}

public function status($id,$status)
{

    if ( Gate::denies('realestates')  ) { abort(404); }
    $user = Realestates::find($id);
    $user->status = $status;
    $user->save();
    return back();

}




}
