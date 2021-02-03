@extends('backend.layouts.default')

@section('content')

 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title"><b>{{__('backend.welcome')}}:</b> {{Auth::user()->name}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-blue rounded">
                                                <i class="fe-aperture avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','news'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate"> {{__('backend.total_posts')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-success rounded">
                                                <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','services'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_services')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-warning rounded">
                                                <i class="fe-bar-chart-2 avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','markets'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_markets')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-info rounded">
                                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','realestates'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_realestates')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->


                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-info rounded">
                                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','videos'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_videos')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->



                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-info rounded">
                                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','advisors'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_advisors')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->


                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-info rounded">
                                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','engineers'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_engineers')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->


                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-info rounded">
                                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($posts->where('main_category','jobs'))}}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('backend.total_jobs')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->





                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

<!--
                                <a href="{{url(config('settings.BackendPath').'/posts/create')}}" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
                                <i class="mdi mdi-plus-circle"></i> Add Post
</a>
-->


                                    <h4 class="header-title mb-4">{{__('backend.latest_posts')}} </h4>

                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th> {{__('backend.photo')}} </th>
                                            <th> {{__('backend.title')}} </th>
                                            <th>  {{__('backend.category')}} </th>
                                            <th> {{__('backend.status')}} </th>
                                            <th> {{__('backend.created_at')}} </th>

                                            <th class="hidden-sm">{{__('backend.options')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        @foreach($posts->take('10') as $post)
                                        <tr>
                                            <td><b>#{{$post->id}}</b></td>
                                            <td> <div>

<img src="{{url('')}}\image\100\70\posts\{{$post->photo}}" alt="product-pic" class="img-fluid">
</div>

                                            <td>
                                                <a target="_blank" href="{{$post->preview_path()}}" class="text-body">

                                                    <span class="ml-2">{{$post->title}}</span>
                                                </a>
                                            </td>


                                            <td>


                                                    <span class="ml-2">
                                                    {{__('backend.'.$post->category == '' ? : __('backend.other') )}}
                                                    </span>

                                            </td>



                                            <td>
                                            @if($post->status == '0')
                                                <span class="badge badge-danger">Unpublished</span>
                                                @else
                                                <span class="badge badge-success">Published</span>
                                                @endif
                                            </td>



                                            <td>
                                            {{$post->created_at}}
                                            </td>

                                            <td>
                                            <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/posts/{{$post->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>

                                                        @if( $post->status == 1 )
                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/posts/status/{{$post->id}}/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.block')}}</a>

                                                        @else

                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/posts/status/{{$post->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('backend.approve')}} </a>

                                                        @endif


                                                        <a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/posts/delete/{{$post->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach





                                        </tbody>
                                    </table>
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
