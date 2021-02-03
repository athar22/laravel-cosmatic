
    <!-- Footer -->
    <footer class=" bg-dark footer">
            <div class="container">
              <div class="row">
                <div class="footer-row">

                    <div class="footer-col-1">
                        <a href="index.html"><img src="{{url('')}}/assets/web/images/Footer/logo-footer.png" class="img-responsive" alt="Image"></a>
                        <ul class="clearfix">
                          <li><a href="{{url('')}}">Home</a></li>
						  <li><a href="{{url('')}}/page/about-us">About</a></li>
						  <li><a href="{{url('')}}/page/history">History</a></li>
						  <li><a href="{{url('')}}/category/services">Services </a></li>
						  <li><a href="{{url('')}}/category/products">Products</a></li>
						  <li><a href="{{url('')}}/category/projects">Projects</a></li>
						  <li><a href="{{url('')}}/category/gallery">Gallery </a></li>
						  <li><a href="{{url('')}}/category/videos">Videos </a></li>

                        </ul>
                      </div>


                    <div class="footer-col-2">
                      <h3 class="text-white">Contact us</h3>
                      <div class="border-2-side">
                        <p>Address: {!!$settings->address!!}</p>
                        <p><span >Phone: {{$settings->mobile}}</span></p>
                        <p><span >Email: {{$settings->email}}</span></p>
                      </div>
                    </div>


                    <div class="footer-col-3">
                          <h3 class="text-white">Follow us</h3>
                          <ul class="social social-footer">
                            <li class="facebook"><a href="{{$settings->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="{{$settings->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li class="youtube"><a href="{{$settings->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
                            <li class="instagram"><a href="{{$settings->instagram}}"><i class="fa fa-instagram"></i></a></li>
                          </ul>
                    </div>

                </div> <!-- End footer row -->
                <div class="col-md-12 footer-link">
                  <p>Copyright © 2020 JLK. All rights reserved.</p>
                  <ul>

                    <li><a href="{{url('')}}/page/terms">Term & Conditions</a></li>
                    <li><a href="{{url('')}}/page/policy">Privacy Policy </a></li>
                  </ul>
                </div>
              </div><!-- End Row -->

            </div><!-- End container -->
    </footer><!-- End  -->

  </div> <!-- End Page -->
