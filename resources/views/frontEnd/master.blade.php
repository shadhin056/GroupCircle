<!DOCTYPE html>
<head>
    <title>@yield('Titel')</title>
@include('frontEnd.includes.HeaderTop')
<body style="background: #f7e6ff">
@include('frontEnd.includes.mainPost')



<section id="container">
    <!--header start-->
@include('frontEnd.includes.header')
<!--header end-->
    <!--sidebar start-->
@include('frontEnd.includes.menubar')
<!--sidebar end-->
    <!--main content start-->

@yield('MainContent')


{{--@include('frontEnd.includes.footer')--}}
@include('frontEnd.includes.msgbox')
<!--main content end-->
</section>
@include('frontEnd.includes.chatBoxMain')
@include('frontEnd.includes.scriptFile')

</body>
</html>