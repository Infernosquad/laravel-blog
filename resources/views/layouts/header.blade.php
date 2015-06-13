<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"> {{ trans('navbar.toggle') }} </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                {{ trans('navbar.name') }}
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            {!! $menu_main->asUl(array('class' => 'nav navbar-nav')) !!}
            @include('auth.login')
        </div>
    </div>
</nav>