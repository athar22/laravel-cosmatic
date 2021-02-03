<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use Session;
use Hash;
use Gate;


class UsersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }



  public function index( $lang = null )
  {
    if ( Gate::denies(['users_list'])  ) { abort(404); }
    $lang = LangUser($lang);
    $data = User::orderby('id','desc')->where('role' , 'admin')->paginate(20);
    return view('backend.pages.users.index' , compact('data') );
  }


  
  
  public function create($lang = null)
  {
   if ( Gate::denies(['users_create'])  ) { abort(404); }
   $lang = LangUser($lang);
   $roles = Role::where('status' , 1)->get();
   
   return view('backend.pages.users.create' , compact('roles'));
 }


 public function store(UserRequest $request )
 {
  if ( Gate::denies(['users_create'])  ) { abort(404); } 
  $user = new User;
  $user-> name = $request->name;
  $user-> email = $request->email;
  $user-> phone = $request->phone;
  $user-> password = Hash::make($request->password);
  $user-> role = 'admin';
  $user-> save();


  foreach ($request->role_id as $new_role) {
    $role = Role::findOrFail($new_role);
    $user->assign($role);
  }


  Session::flash('msg', ' Created! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/users');
}

public function edit($id , $lang = null)
{
  if ( Gate::denies(['users_update'])  ) { abort(404); } 
  $lang = LangUser($lang);
  $data = User::find($id);

  $roles = Role::where('status' , 1)->get();
   

  return view('backend.pages.users.edit', compact('roles','data')  );
}



public function update(UserRequest $request, $id)
{
  if ( Gate::denies(['users_update'])  ) { abort(404); } 
  $user= User::find($id);
  $user-> name = $request->name;
  $user-> email = $request->email;
  $user-> phone = $request->phone;
  $user-> role = 'admin';
  
 

  $user->save();


if($request->role_id){
  $user->roles()->detach();
  foreach ($request->role_id as $new_role) {
    $role = Role::findOrFail($new_role);
    $user->assign($role);
  }
}

Session::flash('msg', ' Updated! ' );
Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/users');

  }




  public function status($id , $action)
{

  if ( Gate::denies(['users_status'])  ) { abort(404); } 
  $user= User::find($id);
  $user->status = $action;
  $user->save();

  
  if($action == 1) {
  Session::flash('msg', ' Approved! ' );
  Session::flash('alert', 'success');
} else {
  Session::flash('msg', ' Blocked! ' );
  Session::flash('alert', 'danger');
}
  return redirect()->back();

}



   public function destroy($id)
  {

    if ( Gate::denies(['users_delete'])  ) { abort(404); } 
 
    $user = User::find($id);
    $user->delete();
    Session::flash('msg', ' Deleted! ' );
    Session::flash('alert', 'danger');
    return back();

  }






}