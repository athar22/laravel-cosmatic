@extends('frontend.layouts.default')
@section('content')

<section class="bg-grey padding-top-45 padding-bottom-45 clearfix">
      <div class="container">
          <div class="row">

            <div class="section-title">
              <div class="col-md-12">
                <h2>{{$post->title}}</h2>
              </div>
            </div>
          </div>
      </div>
    </section>







  <!-- Section form contact -->
  <section class="padding-top:50px;">
    	<div class="container">
    		<div class="row">


    			<div class="col-md-12">
                    <div class="zoom-gallery">

                    @foreach( $post->photos as $photo )

					<div class="col-md-3">
					 <a class="img-gallery-contain"  href="{{url('')}}/uploads/gallery/{{$photo->photo}}" data-source="title" title="title"><img src="{{url('')}}/uploads/gallery/{{$photo->photo}}" class="img-responsive" alt="{{$post->title}}"></a>
					</div>

                    @endforeach


                    </div>
                  </div>

    		</div>
    	</div>
    </section>





	<section>
        <div class="container">
            <div class="row">

@if( $post->category != 'videos' && $post->category != 'gallery' )

               <div class="col-xs-12 col-md-6">
                  <img src="{{url('')}}/image/570/400/posts/{{$post->photo}}" class="img-responsive" alt="{{$post->title}}">
                </div>
                <div class="col-xs-12 col-md-6">
@else

<div class="col-xs-12 col-md-12">

@endif


                  <div class="clearfix"></div>
                  <p>{{$post->intro}}</p>
                  <p>{!!$post->content!!}</p>


              </div>
            </div>
        </div>
    </section>


@endsection
@section('head')
<title> {{$post->title}} |  JLK </title>
<meta name="description" content="JLK">
<meta name="keywords" content="JLK">
<meta name="author" content="JLK">

	<meta property="og:type" content="article" />
	<meta property="fb:app_id" content="" />

<meta property="article:published_time" content="{{$post->created_at}}" />
<meta property="article:modified_time" content="{{$post->updated_at}}" />


	<meta property="og:image" content="{{url('')}}/image/620/355/{{$post->image['image'] or 'assests/images/default.jpg'}}" />
	<meta property="og:image:width" content="620" />
	<meta property="og:image:height" content="355" />
	<meta property="og:url" content="{{ Request::fullUrl() }}" />
	<meta property="og:title" content="{{$post->title}}" />
	<meta property="og:locale" content="en_EN" />
	<meta property="og:description" content="{{$post->intro}}" />
	<meta property="og:updated_time" content="{{$post->updated_at}}" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@JLK">
	<meta name="twitter:creator" content="@JLK">
	<meta name="twitter:title" content="{{$post->title}}">
	<meta name="twitter:description" content="{{$post->intro}}">
	<meta name="twitter:image" content="{{url('')}}/image/620/355/{{$post->image['image'] or 'assests/images/default.jpg'}}">
    <meta property="fb:pages" content="" />

@endsection
@section('scripts')
<!--Another Scripts Here-->
@endsection
