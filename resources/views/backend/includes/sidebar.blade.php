 <!-- ========== Left Sidebar Start ========== -->
 <div class="left-side-menu">

<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">{{__('backend.navigation')}}</li>

            <li>
                <a href="{{url( config('settings.BackendPath'))}}">
                    <i class="fe-airplay"></i>
                    <span> {{__('backend.dashboard')}}   </span>
                </a>
            </li>


            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=slider">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.slider')}} </span>
                </a>
            </li>



            <li>
                <a href="{{url(config('settings.BackendPath').'/messages')}}">
                    <i class="fe-airplay"></i>
                    <span> Messages </span>
                </a>
            </li>

            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=services">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.services')}} </span>
                </a>
            </li>

            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=products">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.products')}} </span>
                </a>
            </li>

            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=projects">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.projects')}} </span>
                </a>
            </li>


            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=clients">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.clients')}} </span>
                </a>
            </li>

            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=gallery">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.gallery')}} </span>
                </a>
            </li>


            <li>
                <a href="{{url( config('settings.BackendPath'))}}/posts?main_category=general&category=videos">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.videos')}} </span>
                </a>
            </li>

            <li>
                <a href="{{url(config('settings.BackendPath').'/pages/3/edit')}}">
                    <i class="fe-file-text"></i>
                    <span>  {{__('backend.history')}} </span>
                </a>
            </li>



            <li>
                <a href="{{url(config('settings.BackendPath').'/pages/1/edit')}}">
                    <i class="fe-file-text"></i>
                    <span>  {{__('backend.about')}} </span>
                </a>
            </li>


            <li>
                <a href="{{url(config('settings.BackendPath').'/pages/2/edit')}}">
                    <i class="fe-airplay"></i>
                    <span> {{__('backend.policy')}}  </span>
                </a>
            </li>


            <li>
                <a href="{{url(config('settings.BackendPath').'/settings')}}">
                    <i class="fe-airplay"></i>
                    <span> {{__('backend.settings')}} </span>
                </a>
            </li>


            <li>
                <a href="javascript: void(0);">
                    <i class="fe-file-text"></i>
                    <span> {{__('backend.users')}}  </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{url(config('settings.BackendPath'))}}/users">{{__('backend.users')}}</a>
                    </li>
                    <li>
                        <a href="{{url(config('settings.BackendPath'))}}/roles">{{__('backend.roles')}}</a>
                    </li>

                </ul>
            </li>



        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
