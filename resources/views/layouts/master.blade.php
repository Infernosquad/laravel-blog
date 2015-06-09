<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>

@include('layouts.header')

<div class="container content">
    @yield('content')
</div>

</body>
</html>