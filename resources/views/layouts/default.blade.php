<html>
<head>
    <title>@yield('title', 'Sample App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="/weibo/public/css/app.css">
</head>
<body>
@include('layouts._header')

<div class="container">
    @include('shared._message')
    @yield('content')
    @include('layouts._footer')
</div>
<script src="/weibo/public/js/app.js"></script>
</body>
</html>