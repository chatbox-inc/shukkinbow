<html>
<head>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/@yield('css')">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="/js/function.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="background">
    <div class="container">
        <div class="top-box">
            @yield('top')
        </div>
        <div class="middle-box">
            @yield('middle')
        </div>
        <div class="bottom-box">
            @yield('bottom')
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>