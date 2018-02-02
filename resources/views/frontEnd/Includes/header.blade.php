<header style="background: white" class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a style="text-align: center;" href="{{url('/profile/'.Auth::user()->id)}}" class="logo">
            <h4>{{ Auth::user()->name }}</h4>
        </a>

        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-clock-o"></i>
                   {{-- <span class="badge bg-success">8</span>--}}
                </a>

                <ul style="overflow-y: scroll;height: 400px;" class="w3-animate-zoom dropdown-menu extended tasks-bar">
                    <li>
                        <p class="">Recent Notification</p>
                    </li>
                    @foreach($notificationObj as $notifi)
                        @if ($notifi->message==' update a status ')
                            <li>
                                <a href="{{url('/postById/'.$notifi->link_id)}}" >
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            @if($notifi->anonymous=='on')
                                            <h5 style="color: #64cb2b">Someone</h5>
                                            @else
                                                @if($notifi->user_id==Auth::user()->id)
                                                <h5 style="color: #ff7122">You</h5>
                                                    @else
                                                    <h5 style="color: #84abf9">{{$notifi->user_name}}</h5>
                                                    @endif
                                            @endif
                                            <h5>update a status</h5>
                                            <p>{{$notifi->time}}</p>
                                        </div>

                                    </div>
                                </a>
                            </li>
                        @elseif ($notifi->message==' update a response ')
                            <li>
                                <a href="{{url('/postById/'.$notifi->link_id)}}">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            @if($notifi->anonymous=='anonymous')
                                                <h5 style="color: #64cb2b" >Someone</h5>
                                            @else
                                                @if($notifi->user_id==Auth::user()->id)
                                                    <h5 style="color: #ff7122">You</h5>
                                                @else
                                                    <h5 style="color: #84abf9">{{$notifi->user_name}}</h5>
                                                @endif
                                            @endif
                                            <h5>update a response</h5>
                                            <p>{{$notifi->time}}</p>
                                        </div>

                                    </div>
                                </a>
                            </li>
                        @elseif ($notifi->message==' update profile ')
                            <li>
                                <a href="{{url('/profile/'.$notifi->link_id)}}">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            @if($notifi->user_id==Auth::user()->id)
                                                <h5 style="color: #ff7122">You</h5>
                                            @else
                                                <h5 style="color: #84abf9">{{$notifi->user_name}}</h5>
                                            @endif
                                            <h5>update profile info</h5>
                                            <p>{{$notifi->time}}</p>
                                        </div>

                                    </div>
                                </a>
                            </li>
                        @else

                        @endif

                    @endforeach

                </ul>
            </li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-mail-reply-all"></i>
                   {{-- <span class="badge bg-success">8</span>--}}
                </a>

                <ul style="overflow-y: scroll;height: 400px;" class="w3-animate-zoom dropdown-menu extended tasks-bar">
                    <li>
                        <p class="">My Notification</p>
                    </li>
                    @foreach($notificationObj as $notifi)
                        @if ($notifi->message==' update a response ' && $notifi->form==Auth::user()->id)
                            <li>
                                <a href="{{url('/postById/'.$notifi->link_id)}}">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            @if($notifi->anonymous=='anonymous')
                                                <h5 style="color: #64cb2b" >Someone</h5>
                                            @else
                                                @if($notifi->user_id==Auth::user()->id)
                                                    <h5 style="color: #ff7122">You</h5>
                                                @else
                                                    <h5 style="color: #84abf9">{{$notifi->user_name}}</h5>
                                                @endif
                                            @endif
                                            <h5>update a response in your post</h5>
                                            <p>{{$notifi->time}}</p>
                                        </div>

                                    </div>
                                </a>
                            </li>
                        @else

                        @endif

                    @endforeach

                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o"></i>
                   {{-- <span class="badge bg-important">4</span>--}}
                </a>

                <ul style="overflow-y: scroll;height: 400px;" class=" w3-animate-zoom dropdown-menu extended inbox">
                    <li>
                        <p class="">Recent Private Text </p>
                    </li>
                    @foreach($notificationObj as $mes)
                        @if($mes->link_id==Auth::user()->id)
                            @continue
                        @elseif($mes->user_id==Auth::user()->id && $mes->message==' send you a message ')
                    <li>
                        <a href="{{url('/privateChat/'.$mes->link_id)}}">
                            <span class="photo"></span>
                            <span class="subject">
                                <span class="from">{{$mes->user_name}}</span><br>
                                <span class="time">{{$mes->time}}</span><br>
                                </span>
                            <span class="message">
                                   {{$mes->message}}
                                </span>
                        </a>

                    </li>
                        @else
                        @endif
                    @endforeach

                </ul>
            </li>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
           {{-- <li id="header_notification_bar" class=" dropdown">
                <a data-toggle="dropdown" class=" dropdown-toggle" href="#">

                    <i class="fa fa-bell-o"></i>
                    --}}{{--<span class="badge bg-warning">3</span>--}}{{--
                </a>


                <ul class="w3-animate-zoom dropdown-menu extended notification">
                    <li>
                        <p>Notifications</p>
                    </li>
                    <li>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href="#"> Server #1 overloaded.</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="alert alert-danger clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href="#"> Server #2 overloaded.</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="alert alert-success clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href="#"> Server #3 overloaded.</a>
                            </div>
                        </div>
                    </li>

                </ul>
            </li>--}}
         {{--   <li id="header_notification_bar" class=" dropdown">
                <a onclick="document.getElementById('id01').style.display='block'" data-toggle="dropdown"
                   class=" dropdown-toggle" href="#">

                    <i class="fa fa-bullhorn"></i>
                    <span class="badge bg-warning">4</span>
                </a>


            </li>--}}
            <li id="header_notification_bar" class=" dropdown">
                <a  data-toggle="modal" data-target="#myModalShadhin"
                   class=" dropdown-toggle" href="#">

                    <i class="fa fa-commenting-o"></i>
                  {{--  <span class="badge bg-warning">3</span>--}}
                </a>


            </li>
            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li style="margin-top: 20px;">
                <form id="searchForm" name="searchForm" method="POST" action="{{url('/searchResult')}}">
                    {{ csrf_field() }}
                    <input type="text" name="searchItem" id="searchItem" class="form-control search" placeholder=" Search">
                </form>
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img style="height: 50px;width: 50px" alt=""  src="{{asset(Auth::user()->proPic=='' ? 'frontEnd/images/avatar.png':Auth::user()->proPic)}}"  >
                    <span class="username"></span>
                    <b class="caret"></b>
                </a>

                <ul class="dropdown-menu extended logout">
                    <li><a href="{{url('/profile/'.Auth::user()->id)}}"><i class="fa fa-user"></i>Profile</a>
                    </li>
                    <li><a href="{{url('/update/basic/'.Auth::user()->id)}}"><i class="fa fa-cog"></i>Settings</a>
                    </li>
                    <li> <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="	fa fa-unlink"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
    <script>
        document.getElementById('searchItem').onkeyup = function(e) {
            if (e.keyCode === 13) {
                document.getElementById('searchForm').submit(); // your form has an id="form"
            }
            return true;
        }

    </script>
</header>