<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!-->
<html class="no-js" lang="en"><!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    @yield('head')


    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Font
  ================================================== -->

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/web/css/font-awesome.min.css">
    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{url('')}}/assets/web/css/bootstrap.min.css"/>
  <!-- SELECTBOX
  ================================================== -->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/web/css/fancySelect.css" media="screen" />

  <!-- SLIDER REVOLUTION 4.x SCRIPTS
  ================================================== -->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/web/css/extralayers.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/web/rs-plugin/css/settings.css" media="screen" />

  <!-- OWL CAROUSEL
  ================================================== -->
  <link rel="stylesheet" href="{{url('')}}/assets/web/css/owl.carousel.css">
  <link rel="stylesheet" href="{{url('')}}/assets/web/css/owl.theme.default.css">
  <!-- SCROLL BAR MOBILE MENU
  ================================================== -->
  <link rel="stylesheet" href="{{url('')}}/assets/web/css/jquery.mCustomScrollbar.css" />
  <!-- MAIN STYLE
  ================================================== -->
  <link rel="stylesheet" href="{{url('')}}/assets/web/style.css"/>

    <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="{{url('')}}/assets/web/favicon.png">


    <!-- Magnific Popup core CSS file
  ================================================== -->
  <link rel="stylesheet" href="{{url('')}}/assets/web/css/magnific-popup.css">


</head>
<body>


    <div id=jSplash>
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>

    <div id="overlay"></div>

    <div class="mobile-menu-first">
        <div id="mobile-menu" class="mobile-menu-light">
          <div class="mCustomScrollbar light" data-mcs-theme="minimal-dark">
              <div class="header-mobile-menu hmm-v1">
                  <span class="has-icon sm-icon"><span class="lnr lnr-phone-handset icon-set-1 icon-xs "></span> <span class="sub-text-icon text-middle"><strong>0112-826-2789</strong></span></span>
              </div>
              <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">History</a></li>
                  <li><a href="#">Services </a></li>
                  <li><a href="#">Products</a></li>
                  <li><a href="#">Projects</a></li>
                  <li><a href="#">Clients </a></li>
                  <li><a href="#">Gallery </a></li>
                  <li><a href="#">Videos </a></li>
                  <li><a href="#">Contact us </a></li>

              </ul>
              <div class="footer-mobile-menu fmm-v1">
                  <ul class="social">
                      <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                      <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>

                  <ul class="address-footer-mobile">

                    <li><a href="#"><span class="lnr lnr-map-marker"></span> 8th floor, 379 city St, Country,10018</a></li>
                    <li><a href="tel:18001236879 "><span class="lnr lnr-smartphone"></span> 002-123-6879 </a></li>
                    <li><a href="mailto:contact@finance.com"><span class="lnr lnr-envelope"></span> info@jlkworld.com</a></li>

                  </ul>
              </div>
          </div>
        </div>
    </div>
  <div id="page">


  @include('frontend.includes.header')
  @yield('content')
  @include('frontend.includes.footer')




     <a id="to-the-top" style="display: block;"><i class="fa fa-angle-up"></i></a> <!-- Back To Top -->
    <!-- SCRIPT
    ================================================== -->
    <script src="{{url('')}}/assets/web/js/vendor/jquery.min.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/jpreLoader.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/jquery.waypoints.min.js"></script>
    <script src="{{url('')}}/assets/web/js/vendor/bootstrap.min.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/easing.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/fancySelect.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/custom.js"></script>
    <!-- Switcher
    ================================================== -->

    <!-- Mobile Menu
    ================================================== -->
     <script src="{{url('')}}/assets/web/js/plugins/jquery.mobile-menu.js"></script>
     <script src="{{url('')}}/assets/web/js/plugins/sticky.min.js"></script>
    <!-- Revo Lib
    ================================================== -->
    <script type="text/javascript" src="{{url('')}}/assets/web/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/assets/web/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Custom Revoslider -->
    <script src="{{url('')}}/assets/web/js/plugins/revoslider-custom.js"></script>
    <!-- Counter Up
    ================================================== -->
    <script src="{{url('')}}/assets/web/js/plugins/jquery.animateNumber.min.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/custom-counterup.js"></script>
    <!-- Initializing the isotope
    ================================================== -->
    <script src="{{url('')}}/assets/web/js/plugins/isotope.pkgd.min.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/custom-isotope.js"></script>
    <!-- Initializing Owl Carousel
    ================================================== -->
    <script src="{{url('')}}/assets/web/js/plugins/owl.carousel.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/custom-owl.js"></script>
    <!-- Progress Bar Chart
    ================================================== -->
    <script src="{{url('')}}/assets/web/js/plugins/bootstrap-progressbar.min.js"></script>
    <script src="{{url('')}}/assets/web/js/plugins/custom-progressbar.js"></script>


    <!-- Magnific Popup core JS file
    ================================================== -->
    <script src="{{url('')}}/assets/web/js/plugins/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
            $('.zoom-gallery').magnificPopup({
              delegate: 'a',
              type: 'image',
              closeOnContentClick: false,
              closeBtnInside: false,
              mainClass: 'mfp-with-zoom mfp-img-mobile',
              image: {
                verticalFit: true,
                titleSrc: function(item) {
                  return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                }
              },
              gallery: {
                enabled: true
              },
              zoom: {
                enabled: true,
                duration: 500,
                opener: function(element) {
                  return element.find('img');
                }
              }

            });
          });
    </script>



</body>
</html>
