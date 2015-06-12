<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>

@include('layouts.header')

<div class="container content">
    @include('misc.validation')
    @include('misc.alert',['name' => 'message', 'type' => 'info'])
    @yield('content')
</div>

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>