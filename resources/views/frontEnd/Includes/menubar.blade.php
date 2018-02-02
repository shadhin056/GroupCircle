<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{url('/home')}}">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>

                </li>
                <li>
                    <a class="" href="{{url('/gallery/'.Auth::user()->id)}}">
                        <i class="fa fa-photo"></i>
                        <span>Gallery</span>
                    </a>

                </li>

                {{--<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Update profile</span>
                    </a>

                    <ul class="sub">
                        <li><a href="{{url('/update/login/'.Auth::user()->id)}}">Login Information </a>
                        </li>
                        <li><a href="{{url('/update/basic/'.Auth::user()->id)}}">Basic Information</a>
                        </li>
                        <li><a href="{{url('/update/education/'.Auth::user()->id)}}">Education and Qualification</a>
                        </li>
                    </ul>
                </li>--}}
                <li>
                    <a href="{{url('/update/login/'.Auth::user()->id)}}">
                        <i class="fa fa-user-secret"></i>
                        <span>Update Login Information </span>
                    </a>

                </li><li>
                    <a href="{{url('/update/basic/'.Auth::user()->id)}}">
                        <i class="fa fa-pencil-square-o"></i>
                        <span>Update Basic Information</span>
                    </a>

                </li><li>
                    <a href="{{url('/update/education/'.Auth::user()->id)}}">
                        <i class="fa fa-pencil-square-o"></i>
                        <span>Update Education and Qualification</span>
                    </a>

                </li><li>
                    <a href="{{url('/profile/'.Auth::user()->id)}}">
                        <i style="color: white" class="glyphicon glyphicon-user"></i>
                        <span>My Profile </span>
                    </a>

                </li>
                <li>
                    <a href="{{url('/allpostById/'.Auth::user()->id)}}">
                        <i class="fa fa-id-card-o"></i>
                        <span>My All post </span>
                    </a>

                </li>

                <li>
                    <a href="{{url('/privateChat/'.Auth::user()->id)}}">
                        <i class="fa fa-comments-o"></i>
                        <span>Private Chat </span>
                    </a>

                </li>
               {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>

                    <ul class="sub">
                        <li><a href="basic_table.html">Basic Table</a>
                        </li>
                        <li><a href="responsive_table.html">Responsive Table</a>
                        </li>
                    </ul>
                </li>--}}
             {{--   <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Form Components</span>
                    </a>

                    <ul class="sub">
                        <li><a href="form_component.html">Form Elements</a>
                        </li>
                        <li><a href="form_validation.html">Form Validation</a>
                        </li>
                        <li><a href="dropzone.html">Dropzone</a>
                        </li>
                    </ul>
                </li>--}}
               {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>

                    <ul class="sub">
                        <li><a href="mail.html">Inbox</a>
                        </li>
                        <li><a href="mail_compose.html">Compose Mail</a>
                        </li>
                    </ul>
                </li>--}}
                <li>
                    <a onclick="w3_open()" href="javascript:;">
                        <i class=" fa fa-group"></i>
                        <span>Group Chat</span>
                    </a>

                    <!--<ul class="sub">
            <li><a href="chartjs.html">Chart js</a></li>
            <li><a href="flot_chart.html">Flot Charts</a></li>
        </ul>-->
                </li>
                {{--<li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>

                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a>
                        </li>
                        <li><a href="vector_map.html">Vector Map</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>

                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a>
                        </li>
                        <li><a href="404.html">404 Error</a>
                        </li>
                        <li><a href="registration.html">Registration</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>

                </li>--}}
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>