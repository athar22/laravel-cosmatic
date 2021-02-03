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


<h3 class="header-title mb-4">

العقارات

</h3>

                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>
                                        <th> {{__('backend.photo')}} </th>
                                                <th> {{__('backend.title')}} </th>
                                                <th> السعر </th>
                                                <th> المساحة </th>
                                                <th> المنطقة </th>
                                                <th> {{__('backend.status')}} </th>
                                                <th class="hidden-sm"> {{__('backend.options')}}</th>


                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach ( $data as $row )

                                        <tr @if ($row->status == 0) style="background-color:#fafafa;" @endif>

                                        <td> <div>

<img src="{{url('')}}/image/100/70/{{$row->photo}}" alt="product-pic" class="img-fluid">
</div>

<td>
@if($row->status == 0)
<a target="_blank"  href="{{ $row->preview_path() }}"  class="text-body">
@else
<a target="_blank" href="{{ $row->path() }}"  class="text-body">
@endif

 {{$row->title}}  </a></td>
<td> <a  href="" class="text-body"> {{$row->price}}  </a></td>
<td> <a  href="" class="text-body"> {{$row->area}}  </a></td>
<td> <a  href="" class="text-body"> {{$row->city}}  </a></td>
<td>
@if( $row->status == 1 )
<span class="label label-sm label-success">{{__('backend.approved')}}</span>
@else
<span class="label label-sm label-danger"> {{__('backend.blocked')}} </span>
@endif
</td>



                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>



                                                    <div class="dropdown-menu dropdown-menu-right">


                                                        @if( $row->status == 1 )
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/realestates/status/{{$row->id}}/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.block')}}</a>

                                                        @else

                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/realestates/status/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.approve')}} </a>

                                                        @endif


                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/realestates/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach


                                        </tbody>
                                    </table>


                                    {{$data->links()}}


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
