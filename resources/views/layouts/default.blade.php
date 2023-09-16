<!doctype html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
@section('title', 'Page Title')
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
<script src='{{ asset("js/bootstrap-5.0.2-dist//js/bootstrap.bundle.min.js") }}' integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>