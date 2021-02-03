<header id="sticked-menu" class="header header-v3">
      <div class="container">
        <div class="top-header">
            <div class="logo">
                <div class="mm-toggle visible-xs visible-sm">
                    <i class="fa fa-bars"></i><span class="mm-label">Menu</span>
                </div>
                <a href="index.html"><img src="{{url('')}}/assets/web/images/Header/logo.png" class="img-responsive" alt="Image"></a>
              </div>
              <div class="navi-right">
                      <ul>
                        <li class="hidden-md">
                           <span class="has-icon">
                              <span class="lnr lnr-phone-handset icon-set-1 icon-xs"></span>
                              <span class="sub-text-icon text-top">
                                 <strong>{{$settings->mobile}}</strong>
                                 {{$settings->email}}
                              </span>
                           </span>
                        </li>
                        <li class="hidden-md">
                           <span class="has-icon">
                              <span class="lnr lnr-map-marker icon-set-1 icon-xs"></span>
                              <span class="sub-text-icon text-top">
                              <strong> {!!$settings->address!!}</strong>

                              </span>
                           </span>
                        </li >
                        <li class="hidden-md">
                           <span class="has-icon">
                              <span class="lnr lnr-clock icon-set-1 icon-xs"></span>
                              <span class="sub-text-icon text-top">
                                 <strong>{!!$settings->can_i_help!!}</strong>

                              </span>
                           </span>
                        </li>

                      </ul>
              </div>
        </div>

      </div>
      <div class="section-navi">

          <div class="container">
              <nav class="navi-desktop-site navi-desktop-site-1 hidden-sm hidden-xs">
                      <ul class="navi-level-1 uppercase">
                          <li><a href="{{url('')}}">Home</a></li>
						  <li><a href="{{url('')}}/page/about-us">About</a></li>
						  <li><a href="{{url('')}}/page/history">History</a></li>
						  <li><a href="{{url('')}}/category/services">Services </a></li>
						  <li><a href="{{url('')}}/category/products">Products</a></li>
						  <li><a href="{{url('')}}/category/projects">Projects</a></li>
						  <li><a href="{{url('')}}/category/gallery">Gallery </a></li>
						  <li><a href="{{url('')}}/category/videos">Videos </a></li>
						  <li><a href="{{url('')}}/page/contact-us">Contact us </a></li>
                      </ul>
              </nav>
          </div>
      </div>
    </header>
