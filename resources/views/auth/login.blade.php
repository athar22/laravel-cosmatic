<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>WebGround</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="WebGround" name="description" />
        <meta content="WebGround" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('')}}/assets/admin/images/favicon.ico">

        <!-- App css -->
        <link href="{{url('')}}/assets/admin/css-{{$AppDirUser}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{$AppDirUser}}/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{$AppDirUser}}/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="{{url('')}}">
                                        <span><img src="{{url('')}}/assets/admin/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">
                                    {{__('backend.enter_users_password')}}</p>
                                </div>

                      <form method="POST" action="{{ route('login') }}">
                        @csrf

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">{{__('backend.email')}} @error('email'): <strong style="color:red;">{{ $message }}</strong>@enderror</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required="" placeholder="Enter your email">
                                    </div>



                                    <div class="form-group mb-3">
                                        <label for="password">{{__('backend.password')}} @error('password'): <strong style="color:red;">{{ $message }}</strong>@enderror </label>


                                        <input class="form-control" type="password" required="" id="password" name="password" value="{{ old('password') }}" placeholder="Enter your password">
                                    </div>



                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin"> {{__('backend.remember_me')}}  </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> {{__('backend.login_in')}}  </button>
                                    </div>

                                </form>




                            </div> <!-- end card-body -->
                        </div>



                    </div> <!-- end col -->
                </div>

                <footer class="footer footer-alt">
            {{date('Y')}} &copy; WebGround theme by <a href="#" class="text-white-50">WebGround</a>
        </footer>

                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->




        <!-- Vendor js -->
        <script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{url('')}}/assets/admin/js/app.min.js"></script>

    </body>

<!-- Mirrored from WebGround.com/WebGround/layouts/light/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2019 13:30:23 GMT -->
</html>
