@extends('frontend.layouts.default')
@section('content')

<section class="bg-grey padding-top-45 padding-bottom-45 clearfix">
      <div class="container">
          <div class="row">
            <div class="section-title">
              <div class="col-md-12">

                <h2>{{ isset($posts[0]->category) ? ucfirst( $posts[0]->category ) : 'Category'  }}</h2>

              </div>
            </div>
          </div>
      </div>
    </section>


 <section>
            <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="section-isotope-project-3-column">

                        <div class="row">
                          <div class="clearfix projectContainer projectContainer3column">


                          @foreach( $posts as $post )

                              <div class="element-item ">
                                <a class="img-contain-isotope" href="{{$post->path()}}">
                                  <img src="{{url('')}}/image/370/270/posts/{{$post->photo}}" class="img-responsive" alt="{{$post->title}}">
                                </a>
                                  <a href="{{$post->path()}}"><h5 class="title-project">{{$post->title}}</h5></a>
                              </div>

                          @endforeach

                          <div class="pagination-holder">
                           <nav>
                              <ul class="pagination">
                              {{ $posts->links() }}
                              </ul>
                           </nav>
                          </div>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
    </section>







@endsection
@section('head')
<title> {{ isset($posts[0]->category) ? ucfirst( $posts[0]->category ) : 'Category'  }} |  JLK </title>
<meta name="description" content="JLK">
<meta name="keywords" content="JLK">
<meta name="author" content="JLK">
@endsection
@section('scripts')
<!--Another Scripts Here-->
@endsection
