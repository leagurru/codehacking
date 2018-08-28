<!DOCTYPE html>
<html lang="en">

@include('includes/front_header')

<body>

<!-- Navigation -->
@include('includes.front_nav')

<!-- Page Content -->
@yield('content')

@include('includes.front_footer')

<hr>

{{--@include('includes.front_footer')--}}

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
