<!DOCTYPE html>
<html lang="en">

@include('newPage.Include2.header')

<body>

<div id="wrapper">

    <!-- Navigation -->
    @include('newPage.Include2.navtop')
    @yield('MainContent2')

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
@include('newPage.Include2.scriptsall')

</body>

</html>
