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
                                <a href="{{url(config('settings.BackendPath').'/roles/create')}}" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add Role
</a>
                                    @endcan

                                    <h4 class="header-title mb-4">{{__('backend.roles')}}  </h4>

                                    <table class="table  m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>

                                                <th> {{__('backend.title')}}  </th>
                                                <th> {{__('backend.permissions')}} </th>
                                                <th> {{__('backend.status')}} </th>
                                                <th class="hidden-sm">{{__('backend.options')}}</th>


                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach ( $data as $row )

                                        <tr>


                                        <td  style="width: 100px;" >  <B> {{$row->title}} </B> </td>


                <td>@foreach ( $row->permissions->where('parent_id' , 0) as $permission )


                <p> <B> {{__('backend.'.$permission->name)}} </B></p>


                 @foreach ( $row->permissions->where('parent_id' , $permission->id) as $list_permission )

                <li> {{__('backend.'.$list_permission->name)}} </li>

                 @endforeach

                 <hr>


                  @endforeach

                  </td>


<td style="width: 100px;">
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
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/{{$row->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>

                                                        @if( $row->status == 1 )
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/status/{{$row->id}}/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.block')}}</a>

                                                        @else

                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/status/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.approve')}} </a>

                                                        @endif


                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>

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
