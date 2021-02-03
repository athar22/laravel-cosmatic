@extends('backend.layouts.default')

@section('content')

<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">


                <h4 class="header-title mb-4">Settings</h4>



 {!! Form::model($settings , [ 'url' => config('settings.BackendPath').'/settings', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}


              <div class="form-body">

                @include('backend.includes.errors')


                <h4 class="form-section"><i class="la la-pencil-square"></i>   </h4>


                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> About us </label>

                      {!! Form::textarea('about_us', null ,['class' => 'form-control' , 'rows' => '4'  , 'placeholder'=> 'About us - Home Page'] ) !!}

                    </div>
                  </div>
                </div>


                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> History </label>

                      {!! Form::textarea('history', null ,['class' => 'form-control' , 'rows' => '4'  , 'placeholder'=> 'History - Home Page'] ) !!}

                    </div>
                  </div>
                </div>






                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> Contact us </label>

                      {!! Form::textarea('contact', null ,['class' => 'form-control' , 'rows' => '4'  , 'placeholder'=> 'Contact us Page'] ) !!}

                    </div>
                  </div>
                </div>



                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> Phone Numbers </label>

                      {!! Form::text('mobile', null ,['class' => 'form-control' , 'placeholder'=> 'Phone Numbers'] ) !!}

                    </div>
                  </div>
                </div>




                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> Email </label>

                      {!! Form::text('email', null ,['class' => 'form-control' , 'placeholder'=> 'EMAIL'] ) !!}

                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> Addess </label>

                      {!! Form::text('address', null ,['class' => 'form-control' , 'placeholder'=> 'Addess'] ) !!}

                    </div>
                  </div>
                </div>



                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="projectinput4">Can I Help 24/7 </label>

                      {!! Form::text('can_i_help', null ,['class' => 'form-control'  , 'placeholder'=> 'Can I Help 24/7 - Home Page'] ) !!}

                    </div>
                  </div>
                </div>


<div class="row">

<div class="col-md-12">
  <div class="form-group">
    <label for="projectinput4"> Location Map </label>

    {!! Form::textarea('map', null ,['class' => 'form-control' , 'rows' => '4'  , 'placeholder'=> 'Location Map - Contact Page'] ) !!}

  </div>
</div>
</div>




<div class="row">

<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput4"> Facebook  </label>

    {!! Form::text('facebook', null ,['class' => 'form-control' ,  'placeholder'=> 'Facebook URL'] ) !!}

  </div>
</div>


<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput4"> Twitter  </label>

    {!! Form::text('twitter', null ,['class' => 'form-control' ,  'placeholder'=> 'Twitter URL'] ) !!}

  </div>
</div>



<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput4"> Youtube  </label>

    {!! Form::text('youtube', null ,['class' => 'form-control' ,  'placeholder'=> 'Youtube URL'] ) !!}

  </div>
</div>




<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput4"> Instagram  </label>

    {!! Form::text('instagram', null ,['class' => 'form-control' ,  'placeholder'=> 'Instagram URL'] ) !!}

  </div>
</div>


</div>








                <div class="form-actions">

                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Update
                  </button>
                </div>


                {!!Form::close()!!}

                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection


@section('head')

<title>{{config('settings.ProjectName')}}</title>


         <!-- Plugins css -->
         <link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
		 <link href="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

		<!-- third party css -->
        <link href="{{url('')}}/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{url('')}}/assets/admin/css-{{$AppDirUser}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{$AppDirUser}}/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{$AppDirUser}}/app.min.css" rel="stylesheet" type="text/css" />



@endsection

@section('scripts')

 <!-- Right bar overlay-->
       <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>
        <!-- Chart JS -->
        <script src="{{url('')}}/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/moment/moment.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Chat app -->
        <script src="{{url('')}}/assets/admin/js/pages/jquery.chat.js"></script>
        <!-- Todo app -->
        <script src="{{url('')}}/assets/admin/js/pages/jquery.todo.js"></script>
        <!-- Dashboard init JS -->
        <script src="{{url('')}}/assets/admin/js/pages/dashboard-3.init.js"></script>
        <!-- App js-->
        <script src="{{url('')}}/assets/admin/js/app.min.js"></script>

@endsection
