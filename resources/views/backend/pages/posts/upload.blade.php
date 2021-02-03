@extends('backend.layouts.default')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">


<form action="{{ url('') }}/{{config('settings.BackendPath')}}/posts/upload" id="form_upload"
 enctype="multipart/form-data" method="POST">


 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="post_id" value="{{$post->id}}">


<div class="col-md-12">
  <div class="form-group">
  <label> Photos  </label>

  <label id="projectinput7" class="file center-block">
    <input type="file" name='photo[]' multiple="multiple" id="file">
    <span class="file-custom"></span>
  </label>
</div> </div>



<div class="form-actions">

<button type="submit" class="btn btn-primary">
  <i class="la la-check-square-o"></i> {{ __('backend.save')}}
</button>
</div>


 </form>


                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->







<div class="container-fluid">
<div class="row">
@foreach($post->photos as $photo)
 <div class="col-lg-6 col-xl-3">
	<div class="card">
		<img class="card-img-top img-fluid" src="{{url('')}}/uploads/gallery/{{$photo->photo}}" alt="">
		<div class="card-body">
			<a href="{{url('')}}/{{config('settings.BackendPath')}}/upload/gallery/delete/{{$photo->id}}" class="btn btn-primary waves-effect waves-light">Delete</a>
		</div>
	</div>
</div>
@endforeach
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
