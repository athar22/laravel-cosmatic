@extends('frontend.layouts.default')
@section('content')




<section class="bg-grey padding-top-45 padding-bottom-45 clearfix">
      <div class="container">
          <div class="row">
            <div class="section-title">
              <div class="col-md-12">
                <h2>Contact us</h2>
              </div>
            </div>
          </div>
      </div>
    </section>




  <!-- Section form contact -->
    <section class="padding-top:50px;">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 left-contact">


@if($message = Session::get('msg'))

  <h4>Your Message has been sent .. Thank you!  </h4>

@else
<h4> Send Us a Message</h4>



<form  name="contact" class="form-inline form-contact-finance" method='post' action="{{url('/quote')}}"  >

{!! Form::token() !!}


            					<div class="row">
        							  <div class="form-group col-sm-12  col-md-4">
        							    <input type="text" class="form-control" name="name" id="yourName" placeholder="Your Name">
        							  </div>
        							  <div class="form-group col-sm-12 col-md-4">
        							    <input type="email" class="form-control" name="email" id="yourEmail" placeholder="Your Email" >
        							  </div>
        							  <div class="form-group col-sm-12 col-md-4">
        							    <input type="text" class="form-control" name="phone" id="phoneNumber" placeholder="Phone Number" >
        							  </div>
      						    </div>
      						    <div class="input-content">
        						  	<div class="form-group form-textarea">
        					  			<textarea id="textarea" class="form-control" name="message" rows="6" placeholder="Your Messages" ></textarea>
        						  	</div>
        						  </div>
                      <button type="submit"  class="ot-btn large-btn btn-rounded  btn-main-color btn-submit">Send </button>
                           </form> <!-- End Form -->

                           @endif


    			</div> <!-- End col -->

    			<div class="col-md-4 right-contact">
    				<h4>Contact Info</h4>
    				<p>
                    {{$settings->contact}}
    				</p>
    				<ul class="address">
    					<li><p><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;{!!$settings->address!!}</p></li>
    					<li><p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp; {{$settings->mobile}}</p></li>

    					<li><p><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp; {{$settings->email}}</p></li>
    					<li><p><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp; {!!$settings->can_i_help!!}</p></li>
    				</ul>
    			</div>

    		</div>
    	</div>
    </section>


   	<div class="no-padding ">
   		<div  class="margin-top-15">

           {!!$settings->map!!}

		</div>
   	</div>






@endsection
@section('head')
<title> Contact us |  JLK </title>
<meta name="description" content="JLK">
<meta name="keywords" content="JLK">
<meta name="author" content="JLK">
@endsection
@section('scripts')
<!--Another Scripts Here-->
@endsection
