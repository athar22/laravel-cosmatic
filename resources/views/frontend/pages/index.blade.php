@extends('frontend.layouts.default')
@section('content')


<div class="slider clearfix">
       <div class="fullwidthbanner-container">
          <div id="revolution-slider-home-3" class="slider-home-3">
           <ul>

           @foreach( $silder as $post)

              <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                <img src="{{url('')}}/image/1900/550/posts/{{$post->photo}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center" data-bgrepeat="no-repeat">
              </li>

           @endforeach


            </ul>

          </div>
        </div>
      </div>

      <!-- Component Thumbnail Center Icon SVG-->
      <div class="padding-top-50 padding-bottom-50">
        <div class="container">
        <div class="row">

            <article class="col-xs-12 col-sm-6 col-md-6 thumbnail-style thumbnail-icon-item text-center">
                 <div class="thumbnail">
                   <div class="caption">
                     <h4>About</h4>
                     <p>

                     {{$settings->about_us}}
                     </p>

                   </div>
                 </div>
            </article>

            <article class="col-xs-12 col-sm-6 col-md-6 thumbnail-style thumbnail-icon-item text-center">

                 <div class="thumbnail">
                   <div class="caption">
                     <h4>History</h4>
                     <p>
                     {{$settings->history}}


                     </p>

                   </div>
                 </div>
            </article>




          </div> <!-- End Row -->
        </div>
      </div><!-- End section -->

    <!-- Component Our Services 3 Column Owl -->
    <section class="bg-grey">
      <div class="container">
        <div class="overflow-hidden">
          <div class="row">
              <div class="col-md-12">
                  <h2 class="title">Services</h2>
                  <div class="customNavigation">
                    <a class="btn prev-services-3-columns"><i class="fa fa-angle-left"></i></a>
                    <a class="btn next-services-3-columns"><i class="fa fa-angle-right"></i></a>
                  </div>
              </div>
            <div class="warp-owl-services">
                <div id="owl-services-3-columns" class="owl-carousel owl-theme owl-services-3-columns clearfix">



@foreach( $services as $post)

              <div class="item item-services">
                  <div class="thumbnail">
                      <a href="{{$post->path()}}" class="services-3-column-img-container">
                        <img src="{{url('')}}/image/360/170/posts/{{$post->photo}}" alt="{{$post->title}}">
                        <h4>{{$post->title}}</h4>
                      </a>

                      <div class="caption">

                        <p>
                        {{$post->intro}}
                        </p>
                        <a class="learn-more" href="{{$post->path()}}"><i class="fa fa-caret-right" aria-hidden="true"></i>  More

                        </a>
                      </div>
                  </div>
              </div>


@endforeach






                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="no-padding">
          <div class="container">
            <div class="row">
			<br>
			<div class="col-md-12">
                  <h2 class="title">Products</h2>
              </div>
            </div>


			<div class="products row">


            @foreach( $products as $post)

					<div class="product-item col-md-3">
						<figure>
							<a href="{{$post->path()}}"><img alt="{{$post->title}}" src="{{url('')}}/image/270/270/posts/{{$post->photo}}"></a>
						</figure>
						<div class="product-detail">
							<h3><a href="{{$post->path()}}">{{$post->title}}</a></h3>
							<a href="{{$post->path()}}" class="ot-btn btn-main-color icon-btn-left"> Details</a>
						</div>
                    </div>

           @endforeach







			</div>



          </div>
    </section>



      <div class="overlay-parallax" style="background-image: url({{url('')}}/assets/web/images/Overlay/2.jpg);">
            <div class="overlay-counter" >
              <div class="container-overlay-parallax-text counter-up counter-up-style-1 counter-up-style-2">
                  <ul class="">
                    <li>
                      <span class="label-counter">Products</span>
                      <p><span class="couterup " id="employeess">{{$total_products}}</span></p>

                    </li>
					<li>
                      <span class="label-counter">Services</span>
                      <p><span class="couterup " id="employeesx">{{$total_services}}</span></p>

                    </li>
					<li>
                      <span class="label-counter">Projects</span>
                      <p><span class="couterup " id="employeesq">{{$total_projects}}</span></p>

                    </li>

                  </ul>
              </div>

          </div>
          <div class="overlay-parallax-bg"></div>
      </div>




    <section>
            <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <h2 class="title">Our Projects</h2>

                          <div class="customNavigation">
                            <a class="btn prev-project"><i class="fa fa-angle-left"></i></a>
                            <a class="btn next-project"><i class="fa fa-angle-right"></i></a>
                         </div><!-- End owl button -->

                        <div id="owl-project" class="owl-carousel owl-theme  owl-project clearfix">


                        @foreach( $projects as $post)

                              <div class="item">
                                    <a href="{{$post->path()}}">
                                      <img src="{{url('')}}/image/293/221/posts/{{$post->photo}}" class="img-responsive" alt="{{$post->title}}">
                                      <h5 class="title-project">{{$post->title}}</h5>
                                    </a>
                              </div>


                       @endforeach


                        </div>
                    </div>
                  </div>
            </div>
    </section>


  <!-- Component Our Partners Owl -->
    <section>
        <div class="container">
           <div class="row">
             <div class="col-md-12">
                <h2 class="title">Clients</h2>
            <div class="customNavigation">
              <a class="btn prev-partners"><i class="fa fa-angle-left"></i></a>
              <a class="btn next-partners"><i class="fa fa-angle-right"></i></a>
            </div><!-- End owl button -->

            <div id="owl-partners" class="owl-carousel owl-theme owl-partners clearfix">

            @foreach( $clients as $post)

              <div class="item">
                  <a href="#">
                    <img src="{{url('')}}/image/210/100/posts/{{$post->photo}}" class="img-responsive" alt="{{$post->title}}">
                  </a>
              </div>

              @endforeach



             </div>

            </div><!-- End row partners -->
           </div><!-- End Row -->
        </div>
    </section><!-- End section -->

@endsection
@section('head')
<title>  JLK </title>
<meta name="description" content="JLK">
<meta name="keywords" content="JLK">
<meta name="author" content="JLK">
@endsection
@section('scripts')
<!--Another Scripts Here-->
@endsection
