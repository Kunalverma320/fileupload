<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body style="background-color: #ec58ad21">
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">
            @yield('content')
    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>
