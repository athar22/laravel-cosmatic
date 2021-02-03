<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostsPhotos;
use App\PostsProperties;
use App\PostsOffers;
use App\PostsProducts;
use Session;
use Gate;

class PostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}



	public function index($lang = null)
	{
		if ( Gate::denies('posts_list') ) { abort(404); }

		$data = Post::query();


		if( isset($_GET['category']) ) {
			$data = $data->where('category', $_GET['category'] );
		}


		if( isset($_GET['main_category']) ) {
			$data = $data->where('main_category', $_GET['main_category'] );
		}

		$data = $data->latest()->paginate(10);

		return view('backend.pages.posts.index',compact('data') );

	}

	public function create($lang = null)
	{
		if ( Gate::denies('posts_create') ) { abort(404); }
		return view('backend.pages.posts.create'  );
	}

	public function store(Request $request)
	{

		if ( Gate::denies('posts_create') ) { abort(404); }
		$post = new Post;
		$post->photo = $request->photo;
		$post->video = $request->video;
		$post->title = $request->title;
        $post->intro = $request->intro;
        $post->status = 0;
		$post->main_category = $request->main_category;
		$post->category = $request->category;
		$post->content = $request->content;
		$post->meta_title = $request->meta_title;
		$post->meta_keywords = $request->meta_keywords;
		$post->meta_description = $request->meta_description;



		if($post->save()) {

			if( $request->services ) {
				$data = new PostsProperties;
				$data->post_id = $post->id;
				$data->services = json_encode($request->services);
				$data->address = $request->address;
				$data->location_map = $request->location_map;
				$data->contact_numbers = $request->contact_numbers;
				$data->sales_numbers = $request->sales_numbers;
				$data->complaints_numbers = $request->complaints_numbers;
				$data->post_website = $request->post_website;
				$data->email = $request->email;
				$data->facebook = $request->facebook;
				$data->twitter = $request->twitter;
				$data->youtube = $request->youtube;
				$data->instagram = $request->instagram;
				$data->save();
			}

			if( $request->offer_photo ) {

				foreach ($request->offer_photo as $k=>$offer_photo) {
					$extension = $offer_photo->getClientOriginalExtension();
					$destinationPath = 'uploads/offers/'.$post->id;
					$filename = $post->id.'_'.$k.".".$extension;
					$offer_photo->move($destinationPath , $filename);

					$offers = new PostsOffers;
					$offers->post_id = $post->id;
					$offers->offer_title = $request->offer_title[$k];
					$offers->offer_photo = $filename;
					$offers->save();

				}


			}


			if( $request->product_title ) {

				foreach ($request->product_title as $k=>$product) {

					$new_product = new PostsProducts;

					if(isset( $request->product_photo[$k] )) {
						$product_photo =$request->product_photo[$k];
						$extension = $product_photo->getClientOriginalExtension();
						$destinationPath = 'uploads/products/'.$post->id;
						$filename = $post->id.'_'.$k.".".$extension;
						$product_photo->move($destinationPath , $filename);
						$new_product->product_photo = $filename;
					}
					$new_product->post_id = $post->id;
					$new_product->product_title = $product;
					$new_product->product_price = $request->product_price[$k];
					$new_product->product_description = $request->product_description[$k];
					$new_product->save();

				}


			}





		}

		Session::flash('msg', 'Created!' );
		Session::flash('alert', 'success');
		return Redirect(config('settings.BackendPath').'/posts?main_category='.$post->main_category.'&category='.$post->category);

	}

	public function edit($id)
	{
		if ( Gate::denies('posts_update') ) { abort(404); }
		$data  = Post::where('posts.id',$id)
		->select('posts_properties.*','posts_properties.id as properties_id','posts.*')
		->leftjoin('posts_properties','posts.id','=','posts_properties.post_id')
        ->first();


		return view('backend.pages.posts.edit', compact('data')  );
	}



	public function update(Request $request, $id)
	{
		if ( Gate::denies('posts_update') ) { abort(404); }
		$post = Post::find($id);
		$post->photo = $request->photo;
		$post->video = $request->video;
		$post->title = $request->title;
		$post->intro = $request->intro;
		$post->content = $request->content;
		$post->meta_title = $request->meta_title;
		$post->meta_keywords = $request->meta_keywords;
		$post->meta_description = $request->meta_description;

		if($post->save()) {
			if( $request->services ) {
				$data = PostsProperties::firstOrNew(['post_id'=>$post->id]) ;
				$data->services = json_encode($request->services);
				$data->address = $request->address;
				$data->location_map = $request->location_map;
				$data->contact_numbers = $request->contact_numbers;
				$data->sales_numbers = $request->sales_numbers;
				$data->complaints_numbers = $request->complaints_numbers;
				$data->post_website = $request->post_website;
				$data->email = $request->email;
				$data->facebook = $request->facebook;
				$data->twitter = $request->twitter;
				$data->instagram = $request->instagram;
				$data->youtube = $request->youtube;
				$data->save();
			}

			if( $request->product_title ) {

				foreach ($request->product_title as $k=>$product) {

					$new_product = new PostsProducts;

					if(isset( $request->product_photo[$k] )) {
						$product_photo =$request->product_photo[$k];
						$extension = $product_photo->getClientOriginalExtension();
						$destinationPath = 'uploads/products/'.$post->id;
						$filename = $post->id.'_'.$k.".".$extension;
						$product_photo->move($destinationPath , $filename);
						$new_product->product_photo = $filename;
					}
					$new_product->post_id = $post->id;
					$new_product->product_title = $product;
					$new_product->product_price = $request->product_price[$k];
					$new_product->product_description = $request->product_description[$k];
					$new_product->save();

				}


			}


		}

		Session::flash('msg', ' Updated ' );
		Session::flash('alert', 'success');
		return Redirect(config('settings.BackendPath').'/posts?main_category='.$post->main_category.'&category='.$post->category);
	}



	public function status($id,$status)
	{

		if ( Gate::denies('posts_update')  ) { abort(404); }

		$user = Post::find($id);
		$user->status = $status;
		$user->save();

		return back();

	}





	public function get_upload($id)
	{

		if ( Gate::denies('posts_update')  ) { abort(404); }
		$post = Post::find($id);
		return view('backend.pages.posts.upload', compact('post')  );

	}




	public function post_upload( Request  $request )
	{

		if ( Gate::denies('posts_update')  ) { abort(404); }


		if ($request->photo) {


			foreach(  $request->photo as $k=>$photo ) {

				$file= $photo;
				$extension = $file->getClientOriginalExtension();
				$destinationPath = 'uploads/gallery/';
				$filename = time().$k.$request->post_id.".".$extension;
				$file->move($destinationPath , $filename);


				$upload = new PostsPhotos;
				$upload->post_id  = $request->post_id;
				$upload->photo  = $filename;
				$upload->save();




			}


		}


		return back();


	}



	public function gallery_delete( $id )
	{

		if ( Gate::denies('posts_update')  ) { abort(404); }
		$user = PostsPhotos::find($id);
		$user->delete();
		Session::flash('msg', ' Deleted! ' );
		Session::flash('alert', 'danger');
		return back();
	}


	public function offers_delete( $id )
	{

		if ( Gate::denies('posts_update')  ) { abort(404); }
		$user = PostsOffers::find($id);
		$user->delete();
		Session::flash('msg', ' Deleted! ' );
		Session::flash('alert', 'danger');
		return back();


	}


	public function products_delete( $id )
	{

		if ( Gate::denies('posts_update')  ) { abort(404); }
		$user = PostsProducts::find($id);
		$user->delete();
		Session::flash('msg', ' Deleted! ' );
		Session::flash('alert', 'danger');
		return back();


	}


	public function destroy($id)
	{

		if ( Gate::denies('posts_delete')  ) { abort(404); }

		$user = Post::find($id);
		$user->delete();
		Session::flash('msg', ' Deleted! ' );
		Session::flash('alert', 'danger');
		return back();

	}

public function post_order( $id , $order )
	{

		//if ( Gate::denies('posts')  ) { abort(404); }

        $data = Post::where('order_list',$order)->orderby('id','desc')->first();
        if($data) {
        $data->order_list = NULL;
        $data ->save();
    }

        $data = Post::find($id);
        $data->order_list = $order ;
        $data ->save();
		return back();

	}



}
