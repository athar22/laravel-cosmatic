<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate,Session,Validator,File;
use App\ImagesLibrary;

class LibraryController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    if ( Gate::denies('images_library')  ) { abort(404); }
    $images = ImagesLibrary::latest()->paginate(4);
    return view('backend.includes.images_library' , compact('images') );
  }

  public function index_ajax(Request $request)
     {

        $images = ImagesLibrary::latest()->paginate(4);
        $data =  view('backend.includes.images_library',compact('images') )->render();
        return response()->json($data);

    }

  public function upload(Request $request)
  {
if ( Gate::denies('images_library')  ) { abort(404); }

if ($request->isMethod('get'))
            return "not valid request get";
        else {

            // Vlaidtion
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );

            //Upload Image
            $extension = $request->file('file')->getClientOriginalExtension();
            $dir = 'uploads/posts/'.date('Y').'/'.date('m');
            $filename = date('Y').'/'.date('m')."/".uniqid() . '_' . time() . '.' . $extension;
            $request->file('file')->move($dir, $filename);

            //GET Image Info

            $imagedetails = getimagesize(url('').'/uploads/posts/'.$filename);
            $width = $imagedetails[0];
            $height = $imagedetails[1];

// Save to Table
$image = new ImagesLibrary;
$image->title = $request->title;
$image->file_name = $filename;
$image->image_width = $width;
$image->image_height = $height;
$image->save();

return array(
    'filename' => $filename,
    'path' => url('').'/uploads/posts/'.$filename
);

  }

}




}
