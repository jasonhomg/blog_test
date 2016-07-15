<!DOCTYPE html>
<html>
<head>
    <title>頁面</title>
    <link rel=stylesheet type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel=stylesheet type="text/css" href="{{asset('assets/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('assets/js/hide&show.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.0.0.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/bootstrap-3.3.6-dist/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/bootstrap-3.3.6-dist/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        @if (Session::has('msg'))
            alert("{{session('msg')}}");
        @endif
    </script>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
            <a href="/" style="color: #3c3c3c; text-decoration: none;"> MY BLOG </a>
        </div>
            @yield('content')
    </div>
    <div class="bottom">
        copyright by jasonhong updatetime:20160711
    </div>
</div>

</body>

</html>