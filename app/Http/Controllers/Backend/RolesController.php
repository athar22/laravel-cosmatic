<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\PermissionRole;
use Session;
use Auth;
use Gate;

class RolesController extends Controller
{

	public function __construct()
  {
    $this->middleware('auth');

  }

  
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($lang = null)
    {
       if ( Gate::denies('roles_list') ) { abort(404); }
	   $data = Role::paginate(10);
	   $lang = LangUser($lang);
       return view('backend.pages.roles.index',compact('data') );
    }
	
	public function create($lang = null)
    {
        if ( Gate::denies('roles_create') ) { abort(404); }
		$permissions = Permission::get();
		$lang = LangUser($lang);
        return view('backend.pages.roles.create' , compact('permissions') );
    }
	
	public function store(Request $request)
    {
        if ( Gate::denies('roles_create') ) { abort(404); }
	    //Store New Role
		$Role = new Role;
		$Role-> title = $request->title;
		$Role ->save();


		//Store Role Permissions
		foreach ($request->permissions as $permission) {

		$permissions = new PermissionRole;
		$permissions-> role_id = $Role->id;
		$permissions-> permission_id = $permission;
		$permissions ->save();
		}
        Session::flash('msg', 'Created!  ' . $Role->title);
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath').'/roles');
    }
	
	
	public function edit($id , $lang = null)
    {
	if ( Gate::denies('roles_update') ) { abort(404); }
    $data= Role::find($id);
	$permissions = Permission::get();
	$lang = LangUser($lang);
    return view('backend.pages.roles.edit' , compact('data','permissions') );
    }
	
	
	public function update(Request $request, $id)
    {
        if ( Gate::denies('roles_update') ) { abort(404); }
	    $Role= Role::find($id);
        $Role-> title = $request->title;
		$Role -> save();

		//Delete old Permissions that not included in array $request->permissions
		$role_prem = PermissionRole::whereRoleId($Role->id)->get();
		if (empty($role_prem->role_id) && isset($request->permissions)) {
		foreach ($role_prem as $permission) {
		if (!in_array($permission->permission_id,$request->permissions)) {
        $PermissionRole = PermissionRole::wherePermissionId($permission->permission_id)->whereRoleId($permission->role_id)->first();
		$PermissionRole = PermissionRole::find($PermissionRole->id);
        $PermissionRole->delete();
		}
		}
		}
		
		
		//Store New Permissions
		if (isset($request->permissions)){
		foreach ($request->permissions as $permission) {
		$prev_prem = PermissionRole::whereRoleId($Role->id)->wherePermissionId($permission)->first();
		if (empty($prev_prem->role_id)) {
		$permissions = new PermissionRole;
		$permissions-> role_id = $Role->id;
		$permissions-> permission_id = $permission;
		$permissions -> save();
		}
		}
		}
		

        Session::flash('msg', 'Updated! ' . $Role->title);
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath').'/roles');
	}
	


	


	public function status($id , $action)
	{
	
	  if ( Gate::denies('roles_status')  ) { abort(404); } 
	  $user= Role::find($id);
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
	
		if ( Gate::denies('roles_delete')  ) { abort(404); } 
	 
		$user = Role::find($id);
		$user->delete();
		Session::flash('msg', ' Deleted! ' );
		Session::flash('alert', 'danger');
		return back();
	
	  }
	

	  



}