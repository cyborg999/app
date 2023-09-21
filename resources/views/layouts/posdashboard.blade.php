<!doctype html>
<html lang="en">
    @include('includes.user.head')
    <body>
        <main class="container-fluid main">
            @include('includes.user.sidebar')
            <section class="content">
                @yield('content')
            </section>
        </main>
        <script src='{{ asset("js/bootstrap-5.0.2-dist//js/bootstrap.bundle.min.js") }}' integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>