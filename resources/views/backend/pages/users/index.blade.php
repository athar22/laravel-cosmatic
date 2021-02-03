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
                                @can('users_create')
                                <a href="{{url(config('settings.BackendPath').'/users/create')}}" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add User
</a>
                                    @endcan

                                    <h4 class="header-title mb-4">Users</h4>

                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>

                                                <th> {{__('backend.name')}} </th>
                                                <th> {{__('backend.email')}} </th>
                                                <th> {{__('backend.phone')}} </th>
                                                <th> {{__('backend.status')}} </th>
                                                <th> {{__('backend.roles')}} </th>
                                                <th> {{__('backend.joined')}} </th>
                                                <th class="hidden-sm">Action</th>


                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach ( $data as $row )

                                        <tr>

                                                <td> {{$row->name}} </td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->phone}}</td>
                                                <td>
@if( $row->status == 1 )
<span class="label label-sm label-success">{{__('backend.approved')}}</span>
@else
<span class="label label-sm label-danger"> {{__('backend.blocked')}} </span>
@endif
</td>
<td>@foreach ( $row->roles as $role )
<span class="label label-sm label-success">{{$role->title}}</span>
@endforeach</td>

                                                <td class="center">{{$row->created_at}} </td>

                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/{{$row->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>

                                                        @if( $row->status == 1 )
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/status/{{$row->id}}/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.block')}}</a>

                                                        @else

                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/status/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.approve')}} </a>

                                                        @endif


                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>

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
