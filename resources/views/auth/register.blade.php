@extends('frontend.layouts.default')
@section('content')



<section class="my-breadcrumb">
         <div class="container page-banner">
            <div class="row">
               <div class="col-sm-12 col-md-12 col-xs-12">
                  <h1>تسجيل حساب جديد</h1>
                  <ol class="breadcrumb">
                     <li><a href="index.html">الرئيسية</a></li>
                     <li class="active">تسجيل حساب جديد</li>
                  </ol>
               </div>
            </div>
         </div>
      </section>




	  <section class="main-content contact-form-style-2">
         <div class="container">
            <div class="row">

               <div class="section">
			    <div class="col-md-3 col-sm-3 col-xs-12 nopadding"></div>

                  <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                     <div class="contact-form ">

@if (count($errors))
<div id='msg' class="note note-danger">
@foreach ($errors->all() as $error)
<p style="color:red;">   {!! $error !!} </p>
@endforeach
</div>
@endif

@if($message = Session::get('msg'))
<div class="alert alert-primary" role="alert">
 <strong> تم تسجيل حسابك بنجاح برجاء مراجعة البريد الالكتروني لتفعيل الحساب </strong>
</div>
@else
{!! Form::open([ 'url' => 'post_register', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}

                        <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                              {!! Form::select('user_type', ['company'=>'نعم','user'=>'لا'] , null , ['placeholder' => '--هل انت مسوق عقارى--' ,'class' => 'form-control' , 'required'=>'required' ] ) !!}
                              </div>
                           </div>


                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">

                                 {!! Form::text('name', null , ['class' => 'form-control' , 'id'=>'name' , 'required'=>'required', 'placeholder'=> 'الاسم'] ) !!}

                              </div>
                           </div>




                           <div id="sex" class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                              {!! Form::select('sex', ['male'=>'ذكر','female'=>'أنثى'] , null , ['placeholder' => '--النوع--' ,'class' => 'form-control' ] ) !!}
                              </div>
                           </div>


                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
  <input type='file' name="photo" id="photo" />
  <img width="200px" id="blah" src="{{url('')}}/uploads/avatar/default.jpg" alt="your image" />
                              </div>
                           </div>



						   <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">


                                 {!! Form::textarea('about', null , ['class' => 'form-control','id'=>'about', 'placeholder' => 'نبذة عنك' , 'rows'=>'2'] ) !!}

                              </div>
                           </div>







                          <div class="col-md-12 col-sm-12 col-xs-12">


                              <div class="form-group">

                                 {!! Form::email('email', null , ['placeholder' => 'البريد الإلكتروني' ,'class' => 'form-control' , 'required'=>'required' ] ) !!}
                                 <p> برجاء استخدام بريد الكتروني فعال لتنشيط حسابك على الموقع </p>

                              </div>
                           </div>


                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">

                                 <input placeholder="كلمة المرور" id="" name="password" class="form-control" required="" type="password">


                              </div>
                           </div>

						  <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <input placeholder="اعادة كلمة المرور" id="" name="password_confirmation" class="form-control" required="" type="password">
                              </div>
                           </div>


                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">


                                 {!! Form::number('phone', null , ['placeholder' => 'رقم التليفون' ,'class' => 'form-control' ] ) !!}


                              </div>
                           </div>



                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <button class="btn btn-colored-blog pull-right flip" type="submit">سجل اشتراكى</button>
                              </div>
                           </div>
                           {!!Form::close()!!}

                           @endif
                     </div>
                  </div>

				  <div class="col-md-3 col-sm-3 col-xs-12 nopadding"></div>

               </div>
            </div>
         </div>
      </section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readURL(this);
    });

$('select[name="user_type"]').on('change', function() {
var user_type = $(this).val();

if( user_type == 'company') {
$('#sex').hide();
$("#name").attr("placeholder","اسم الشركة");
$("#about").attr("placeholder","نبذة عن الشركة");
} else {
$('#sex').show();
$("#name").attr("placeholder","الاسم");
$("#about").attr("placeholder","نبذة عنك");
}

});


</script>
@endsection
@section('head')
<title>  تسجيل جديد | {{config('settings.ProjectName')}} </title>
<meta name="author" content="عقارات القاهرة الجديدة">
@endsection
@section('scripts')
<!--Another Scripts Here-->


@endsection
