@extends('frontend.layouts.default')
@section('content')

<section class="bg-grey padding-top-45 padding-bottom-45 clearfix">
      <div class="container">
          <div class="row">
            <div class="section-title">
              <div class="col-md-12">
                <h2>{{$page->title}}</h2>
              </div>
            </div>
          </div>
      </div>
    </section>

	<section>
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-md-12">

                  <div class="clearfix"></div>
                  <p>{{$page->intro}}</p>
                  <p>{!!$page->content!!}</p>


              </div>
            </div>
        </div>
    </section>





@endsection
@section('head')
<title> {{$page->title}} |  JLK </title>
<meta name="description" content="JLK">
<meta name="keywords" content="JLK">
<meta name="author" content="JLK">
@endsection
@section('scripts')
<!--Another Scripts Here-->
@endsection
