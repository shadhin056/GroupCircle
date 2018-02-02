<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Welcome to Group Circle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Lato')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font: 400 15px;
            line-height: 1.8;
            color: #818181;
        }

        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;
        }

        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .jumbotron {
            background-color: #f4511e;
            color: #fff;
            padding: 100px 25px;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }

        .logo {
            color: #f4511e;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right, .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }

        .carousel-indicators li {
            border-color: #f4511e;
        }

        .carousel-indicators li.active {
            background-color: #f4511e;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #f4511e;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #f4511e !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }

        .navbar {
            margin-bottom: 0;
            background-color: #f4511e;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
        }

        .navbar li a, .navbar .navbar-brand {
            color: #fff !important;
            font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
        }

        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #f4511e !important;
            background-color: #fff !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }

        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #f4511e;
        }

        .slideanim {
            visibility: hidden;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }

        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }

            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }

        @media screen and (max-width: 480px) {
            .logo {
                font-size: 150px;
            }
        }

        .test + .tooltip > .tooltip-inner {
            background-color: #73AD21;
            color: #FFFFFF;
            border: 1px solid green;
            padding: 15px;
            font-size: 20px;
        }

        /* Tooltip on top */
        .test + .tooltip.top > .tooltip-arrow {
            border-top: 5px solid green;
        }

        /* Tooltip on bottom */
        .test + .tooltip.bottom > .tooltip-arrow {
            border-bottom: 5px solid blue;
        }

        /* Tooltip on left */
        .test + .tooltip.left > .tooltip-arrow {
            border-left: 5px solid red;
        }

        /* Tooltip on right */
        .test + .tooltip.right > .tooltip-arrow {
            border-right: 5px solid black;
        }
    </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage"><span class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about"><span class="glyphicon glyphicon-user"></span>About</a></li>
                <li><a href="#services"><span class="glyphicon glyphicon-signal"></span>Services</a></li>
                <li><a href="#portfolio"><span class="glyphicon glyphicon-list-alt"></span>Demo</a></li>
                <li><a href="#Team"><span class="glyphicon glyphicon-usd"></span>Team</a></li>
                <li><a href="#contact"><span class="glyphicon glyphicon-send"></span>Contact</a></li>
                <li><a href="{{url('/login')}}"><span class="glyphicon glyphicon-send"></span>Sign up/in</a></li>

            </ul>
        </div>
    </div>
</nav>


<div>&nbsp;</div>
<div class="jumbotron text-center">
    <div class="row">
        <div style="text-align: right" class="col-sm-5">
            <img style="border-radius: 50%;width: 250px;height: 250px"
                 src="{{asset('frontEnd/images/GroupCircle.jpg')}}" alt="Chicago"></div>
        <div style="text-align: left" class="col-sm-7">
            <h1 style="padding-top: 50px">Group Circle</h1></div>
    </div>


</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>About Our project</h2><br>
            <h4>This project is about online social media service with some features.
                In recent year the online social media services are getting popular. Our system is for everybody of age limit over <b style="color: red">14 years</b>.
                The user can share their thought and can update and delete the post with the feature of uploading photos.
                User can share their post and response anonymously and can chat with them as a group.
                They can send individual message to their friends. The user can login directly or via Facebook, Google, Twitter, Linkdin if he/she has been register.
                The user will be notify is his/her friend is online or if anybody has commented on their post.
                The user can search their friend .
                Our project can be popular among the groups and with their friends and they can create a new group or circle with our site.
            </h4><br>
            <p></p>
            <br>
        </div>
        <div class="col-sm-4">
            <span > <img style="width: 450px;height: 450px" src="{{asset('frontEnd/images/groupcircleLogo.png')}}"> </span>
        </div>
    </div>
</div>

{{--<div class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-globe logo slideanim"></span>
        </div>
        <div class="col-sm-8">
            <h2>Our Values</h2><br>
            <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
            <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</p>
        </div>
    </div>
</div>--}}

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
    <h2>SERVICES</h2>
    <h4>What we offer</h4>
    <br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <span style="font-size: 39px;color: #ff7122" class="fa fa-cogs"></span>
            <h4>Backend</h4>
            <p>Secure platform (Laravel)</p>
        </div>
        <div class="col-sm-4">
            <span  style="font-size: 39px;color: #ff7122"  class="fa fa-comments-o"></span>
            <h4>Live Group Chat</h4>
            <p>Chat with others</p>
        </div>
        <div class="col-sm-4">
            <span  style="font-size: 39px;color: #ff7122"  class="fa fa-weixin"></span>
            <h4>Anonymous</h4>
            <p>anonymous comment and post</p>
        </div>
    </div>
    <br><br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <span  style="font-size: 39px;color: #ff7122"  class="fa fa-user-secret"></span>
            <h4>Private Chat</h4>
            <p>communicate with others</p>
        </div>
        <div class="col-sm-4">
            <span  style="font-size: 39px;color: #ff7122"  class="fa fa-edit"></span>
            <h4>Registration</h4>
            <p>Easy registration process(fb/twitter/github/linkdin/gmail)</p>
        </div>
        <div class="col-sm-4"> <span  style="font-size: 39px;color: #ff7122"  class="fa fa-crop"></span>
            <h4 style="color:#303030;">Design</h4>
            <p>user friendly interface</p>
        </div>
        <div class="col-sm-4">&nbsp;</div>
      {{-- <div class="col-sm-4">
            <span  style="font-size: 39px;color: #ff7122"  class="fa fa-crop"></span>
            <h4 style="color:#303030;">Design</h4>
            <p>user friendly interface</p>
        </div>--}}
    </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>What we have done</h2>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                   {{-- <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>--}}
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <video width="450" height="450" controls>
                            <source src="{{asset('frontEnd/video/ProjectVideo.mp4')}}"  type="video/mp4">

                        </video>

                    </div>

                   {{-- <div class="item">
                        <video width="450" height="450" controls>
                            <source src="{{asset('frontEnd/video/GroupChatVideo.mp4')}}"  type="video/mp4">

                        </video>
                        --}}{{--<div class="carousel-caption">
                            <h3>Sell $</h3>
                            <p>Money Money.</p>
                        </div>--}}{{--
                    </div>
                    <div class="item">
                        <video width="450" height="450" controls>
                            <source src="{{asset('frontEnd/video/RegLogin.mp4')}}"  type="video/mp4">

                        </video>
                        --}}{{--<div class="carousel-caption">
                            <h3>Sell $</h3>
                            <p>Money Money.</p>
                        </div>--}}{{--
                    </div>--}}
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--
          <div class="col-sm-4"></div>
        -->
        {{--<div id="myCarousel01" class="col-sm-4 carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel01" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel01" data-slide-to="1"></li>
                <li data-target="#myCarousel01" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
           --}}{{-- <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset('frontEnd/images/a.png')}}" alt="Chicago">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago - A night we won't forget.</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{asset('frontEnd/images/a.png')}}" alt="Chicago">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago - A night we won't forget.</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{asset('frontEnd/images/a.png')}}" alt="Los Angeles">
                    <div class="carousel-caption">
                        <h3>LA</h3>
                        <p>Even though the traffic was a mess, we had the best time.</p>
                    </div>
                </div>
            </div>--}}{{--

            <!-- Left and right controls -->
           --}}{{-- <a class="left carousel-control" href="#myCarousel01" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel01" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>--}}{{--
        </div>--}}
    </div>
    {{--<h2>What our customers say</h2>--}}
    {{--<div id="myCarousel1" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel1" data-slide-to="1"></li>
            <li data-target="#myCarousel1" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span>
                </h4>
            </div>
            <div class="item">
                <h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
            </div>
            <div class="item">
                <h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span>
                </h4>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>--}}
</div>

<!-- Container (Pricing Section) -->
<div id="Team" class="container-fluid">
    <div class="text-center">
        <h2>Our Team</h2>

    </div>
    <div class="row slideanim">


        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1><img style="border-radius: 50%;width: 200px;height: 200px"
                             src="{{asset('frontEnd/images/joha.png')}}" alt="Chicago"></h1>
                </div>
                <div style="text-align: left" class="panel-body">
                    <p><strong>Name: </strong> Md. Shamsuj Joha</p>
                    <p><strong></strong> Senior Lecturer</p>
                    <p><strong>Instructor</strong> </p>

                </div>
               {{-- <div class="panel-footer">
                    <h3>$29</h3>
                    <h4>per month</h4>
                    <button class="btn btn-lg"><a style="color: black" href="#sign">Sign up</a></button>
                </div>--}}
            </div>
        </div>
        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1><img style="border-radius: 50%;width: 200px;height: 200px"
                             src="{{asset('frontEnd/images/shadhin.jpg')}}" alt="Chicago"></h1>
                </div>
                <div style="text-align: left" class="panel-body">
                    <p><strong>Name: </strong> MD.Moniruzzaman Khondaker</p>
                    <p><strong>ID: </strong> 2012-2-60-056</p>
                    <p><strong>Programmer</strong> </p>

                </div>
               {{-- <div class="panel-footer">
                    <h3>$29</h3>
                    <h4>per month</h4>
                    <button class="btn btn-lg"><a style="color: black" href="#sign">Sign up</a></button>
                </div>--}}
            </div>
        </div>
        <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1><img style="border-radius: 50%;width: 200px;height: 200px"
                             src="{{asset('frontEnd/images/jahid.jpg')}}" alt="Chicago"></h1>
                </div>
                <div style="text-align: left" class="panel-body">
                    <p><strong>Name: </strong> Jahid Ahmed</p>
                    <p><strong>ID: </strong> 2012-3-60-033</p>
                    <p><strong>Programmer Designer and SQA</strong> </p>

                </div>
                {{-- <div class="panel-footer">
                     <h3>$29</h3>
                     <h4>per month</h4>
                     <button class="btn btn-lg"><a style="color: black" href="#sign">Sign up</a></button>
                 </div>--}}
            </div>
        </div>  <div class="col-sm-3 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1><img style="border-radius: 50%;width: 200px;height: 200px"
                             src="{{asset('frontEnd/images/sami.jpg')}}" alt="Chicago"></h1>
                </div>
                <div style="text-align: left" class="panel-body">
                    <p><strong>Name: </strong> Abir Mohammad Rafi Al Sami </p>
                    <p><strong>ID: </strong> 2012-3-60-014</p>
                    <p><strong>Programmer Designer and SQA</strong> </p>

                </div>
                {{-- <div class="panel-footer">
                     <h3>$29</h3>
                     <h4>per month</h4>
                     <button class="btn btn-lg"><a style="color: black" href="#sign">Sign up</a></button>
                 </div>--}}
            </div>
        </div>

    </div>
</div>
<!-- Container (Portfolio Section) -->
<div id="sign" class="container-fluid text-center bg-grey">

</div>
<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">CONTACT</h2>
    <div  class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Dhaka, US</p>
            <p><span class="glyphicon glyphicon-phone"></span> +88 01672708329</p>
            <p><span class="glyphicon glyphicon-envelope"></span> shadhinemail@gmail.com</p>
        </div>
        <div  class="col-sm-7 slideanim">
            <h1 id="hide" hidden>Thanks For Your comment </h1>
            {{csrf_field()}}
            <div id="cDiv">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="cname" name="cname" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="cemail" name="cemail" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea required style="max-width:100%" class="form-control" id="ccomments" name="ccomments" placeholder="Comment"
                      rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button id="obutton" name="obutton" class="btn btn-default pull-right" type="button">Send</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
{{--<h1 style="text-align: center;color: black">Where we are </h1>--}}
<!-- Add Google Maps -->
{{--<div id="googleMap" style="height:400px;width:100%;"></div>--}}
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(41.878114, -87.629798);
        var mapProp = {
            center: myCenter,
            zoom: 12,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({position: myCenter});
        marker.setMap(map);
    }
</script>
<script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap')}}"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>


<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    $('#obutton').click(function (event) {
        var name =$('#cname').val();
        var email =$('#cemail').val();
        var comment =$('#ccomments').val();



        $.post('/OutCustomar',{'name':name,'email':email,'comment':comment,'_token':$('input[name=_token]').val()},function (data) {
            console.log(data);
            $('#cname').val('');
            $('#cemail').val('');
            $('#ccomments').val('');
            $('#hide').show('9000');
            $('#cDiv').hide('9000');
            $('#cDiv').load(location.href +' #cDiv');

        });
    });


</script>
</body>
</html>
