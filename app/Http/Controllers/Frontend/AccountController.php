<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use App\Http\Requests\RealestatesRequest;
use App\Http\Requests\VerifiedRequest;
use App\Realestates;
use App\RealestatePhotos;
use App\Post;
use App\User;
use Hash;
use Auth;
use Session;
use Validator;
class AccountController  extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {


        $account = User::find(\Auth::user()->id);

        $user_realestates  = Realestates::where('user_id' , $account->id )->paginate(9);

        return view('frontend.pages.account' , compact('account','user_realestates'));

    }

    public function add_realestate()
    {

        return view('frontend.pages.add_realestate');

    }


    public function add_account()
    {

        return view('frontend.pages.register_company_users');

    }



    public function post_realestate( RealestatesRequest $request )
 {

    $realestate = new Realestates;

    if( $request->photo ) {
            $extension = $request->photo->getClientOriginalExtension();
            $destinationPath = 'uploads/realestate/covers/';
            $photo_filename = time().".".$extension;
            $request->photo->move($destinationPath , $photo_filename);
            $realestate->photo = $photo_filename;
    }


    $realestate->title = $request->title;
    $realestate->realestate_type = $request->realestate_type;
    $realestate->payment_type = $request->payment_type;
    $realestate->price = $request->price;
    $realestate->is_negotiable = $request->is_negotiable;
    $realestate->rooms = $request->rooms;
    $realestate->bathrooms = $request->bathrooms;
    $realestate->area = $request->area;
    $realestate->floor = $request->floor;
    $realestate->is_furnished = $request->is_furnished;
    $realestate->is_compound = $request->is_compound;
    $realestate->payment = $request->payment;
    $realestate->description = $request->description;
    $realestate->user_id = \Auth::user()->id ;
    $realestate->embed_code = $request->embed_code;
    $realestate->embed_map = $request->embed_map;
    $realestate->government = $request->government;
    $realestate->city = $request->city;
    $realestate->email = $request->email;
    $realestate->phone = $request->phone;
    $realestate->company_id = \Auth::user()->company_id;
    $realestate->status = 0;


    if(  $realestate-> save() ) {

        if( $request->photos ) {

            foreach ($request->photos as $k=>$photo) {
                $extension = $photo->getClientOriginalExtension();
                $destinationPath = 'uploads/realestate/'.$realestate->id;
                $filename = $realestate->id.'_'.$k.".".$extension;
                $photo->move($destinationPath , $filename);

                $offers = new RealestatePhotos;
                $offers->realestate_id = $realestate->id;
                $offers->photo = $filename;
                $offers->save();

            }


        }


    }


    Session::flash('msg', 'realestate_done' );
    Session::flash('alert', 'success');
    return redirect('account');
}


public function post_register_company_users( RegisterRequest $request )
{

$user = new User;
$user-> name = $request->name;
$user-> email = $request->email;
$user-> phone = $request->phone;
$user-> password = Hash::make($request->password);
$user-> role = 'user';
$user-> sex = $request->sex;
$user-> about = $request->about;
$user-> verified = 0;
$user-> status = 0;
$user-> company_id = \Auth::user()->id;
$user-> token = bin2hex(random_bytes(78));

if ( $request->photo ) {
  $user_photo = $request->photo;
  $extension = $user_photo->getClientOriginalExtension();
  $destinationPath = 'uploads/avatar/' ;
  $filename = time().".".$extension;
  $user_photo->move($destinationPath , $filename);
  $user-> photo = $filename;
}

$user-> save();

\Mail::send('emails.activation', ['email' => $user->email , 'token' => $user->token ], function ($message) use($user)
{
  $message->from('activation@realstate2020.eg', 'Realstate2020');
  $message->subject('Realstate2020 - Activation');
  $message->to($user->email);

});

Session::flash('msg', 'thanks_msg' );
Session::flash('alert', 'success');

return redirect('account');


}


public function get_update_realestates( $id )
    {

        $realestates = Realestates::findOrFail($id);

        if($realestates->user_id != \Auth::user()->id) {
            abort(404);
        }

        return view('frontend.pages.update_realestates' , compact('realestates'));

    }


    public function post_update_realestates( RealestatesRequest $request , $id )
    {


           $realestate = Realestates::findOrFail($id);

           if($realestate->user_id != \Auth::user()->id) {
            abort(404);
           }

           if( $request->photo ) {
                   $extension = $request->photo->getClientOriginalExtension();
                   $destinationPath = 'uploads/realestate/covers/';
                   $photo_filename = time().".".$extension;
                   $request->photo->move($destinationPath , $photo_filename);
                   $realestate->photo = $photo_filename;
           }


           $realestate->title = $request->title;
           $realestate->realestate_type = $request->realestate_type;
           $realestate->payment_type = $request->payment_type;
           $realestate->price = $request->price;
           $realestate->is_negotiable = $request->is_negotiable;
           $realestate->rooms = $request->rooms;
           $realestate->bathrooms = $request->bathrooms;
           $realestate->area = $request->area;
           $realestate->floor = $request->floor;
           $realestate->is_furnished = $request->is_furnished;
           $realestate->is_compound = $request->is_compound;
           $realestate->payment = $request->payment;
           $realestate->description = $request->description;
           $realestate->embed_code = $request->embed_code;
           $realestate->embed_map = $request->embed_map;
           $realestate->government = $request->government;
           $realestate->city = $request->city;
           $realestate->email = $request->email;
           $realestate->phone = $request->phone;
           $realestate->status = 0;


           if(  $realestate-> save() ) {

               if( $request->photos ) {

                   foreach ($request->photos as $k=>$photo) {
                       $extension = $photo->getClientOriginalExtension();
                       $destinationPath = 'uploads/realestate/'.$realestate->id;
                       $filename = $realestate->id.'_'.$k.".".$extension;
                       $photo->move($destinationPath , $filename);

                       $offers = new RealestatePhotos;
                       $offers->realestate_id = $realestate->id;
                       $offers->photo = $filename;
                       $offers->save();

                   }


               }


           }


           Session::flash('msg', 'realestate_done' );
           Session::flash('alert', 'success');
           return back();
       }


       public function update_company_account( $id )
       {

           $account = User::find( $id );

           if ( $account->company_id !=  \Auth::user()->id ) {
               abort(404);
           }

           $is_company = 1;

           return view('frontend.pages.update_my_account' , compact('account','is_company'));

       }

public function update_my_account( )
    {
        $account = User::find(\Auth::user()->id);
        return view('frontend.pages.update_my_account' , compact('account'));
    }


    public function update_account( UpdateRegisterRequest $request )
    {

        if( $request->account_id ) {
            $user = User::find($request->account_id);
            if ( $user->company_id !=  \Auth::user()->id ) {
                abort(404);
            }
        } else {
            $user = User::find(\Auth::user()->id);
        }

        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> phone = $request->phone;
        if ( $request->password ) {
        $user-> password = Hash::make($request->password);
        }
        $user-> sex = $request->sex;
        $user-> about = $request->about;

        if ( $request->photo ) {
          $user_photo = $request->photo;
          $extension = $user_photo->getClientOriginalExtension();
          $destinationPath = 'uploads/avatar/' ;
          $filename = time().".".$extension;
          $user_photo->move($destinationPath , $filename);
          $user->photo = $filename;
        }

        $user-> save();

        Session::flash('msg', 'thanks_msg' );
        Session::flash('alert', 'success');

        return back();

        }

public function update_register_company_users()
    {

        return view('frontend.pages.update_register_company_users');

    }


public function post_update_register_company_users( RegisterRequest $request , $id )
{

    $user = new User;
    $user-> name = $request->name;
    $user-> email = $request->email;
    $user-> phone = $request->phone;
    $user-> password = Hash::make($request->password);
    $user-> role = 'user';
    $user-> sex = $request->sex;
    $user-> about = $request->about;
    $user-> verified = 0;
    $user-> status = 0;
    $user-> company_id = \Auth::user()->id;
    $user-> token = bin2hex(random_bytes(78));

    if ( $request->photo ) {
      $user_photo = $request->photo;
      $extension = $user_photo->getClientOriginalExtension();
      $destinationPath = 'uploads/avatar/' ;
      $filename = time().".".$extension;
      $user_photo->move($destinationPath , $filename);
      $user-> photo = $filename;
    }

    $user-> save();

    \Mail::send('emails.activation', ['email' => $user->email , 'token' => $user->token ], function ($message) use($user)
    {
      $message->from('activation@realstate2020.eg', 'Realstate2020');
      $message->subject('Realstate2020 - Activation');
      $message->to($user->email);

    });

    Session::flash('msg', 'thanks_msg' );
    Session::flash('alert', 'success');

    return redirect('account');


    }






public function delete_company_user($id)
{

$user = User::whereId($id)->where('role', 'user')->first();

if( $user->company_id == \Auth::user()->id ) {
    $user->delete();

} else {

    Session::flash('msg', ' تم تملك صلاحيات الحذف  لهذا العميل! ' );
    Session::flash('alert', 'danger');
    return back();

}

  Session::flash('msg', ' تم حذف الحساب بنجاح ' );
  Session::flash('alert', 'danger');
  return back();

}

public function delete_realestates($id)
{
    $realestate = Realestates::findOrFail($id);
    if($realestate->user_id != \Auth::user()->id) {
     abort(404);
    }

    $realestate->delete();

  return back();

}




}
