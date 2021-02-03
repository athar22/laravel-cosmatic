<!DOCTYPE html>
<html lang="{{$AppLangUser}}"  >
<head>


        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="{{config('settings.ProjectName')}}" name="description" />
        <meta content="{{config('settings.ProjectName')}}" name="author" />
        <link rel="shortcut icon" href="{{url('')}}/assets/admin/images/favicon.ico" />
<!-- Summernote css -->
<link href="{{url('')}}/assets/admin/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />

        @yield('head')


    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

        @include('backend.includes.header')

        @include('backend.includes.sidebar')

        @yield('content')

        @include('backend.includes.footer')

            </div>
        <!-- END wrapper -->


@yield('scripts')

<!-- Summernote js -->
<script src="{{url('')}}/assets/admin/libs/summernote/summernote-bs4.min.js"></script>

<!-- Init js
<script src="{{url('')}}/assets/admin/js/pages/form-summernote.init.js"></script>
-->
<script>
$(document).ready(function() {
  $('.summernote').summernote({
    height: 200,
  });
});
</script>


</body>

</html>
