@if (Auth::check())
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('auth.logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
@else
    {!! Form::open(array('route' => 'auth.login_check' ,'method' => 'POST','class' => 'navbar-form navbar-right')) !!}
    <div class="form-group">
        {!! Form::text('email',null,['value' => old('email'),'placeholder' => 'Email','class' => 'form-control']) !!}
        {!! Form::password('password',['placeholder' => 'Password','class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Submit',['class' => 'btn btn-default']) !!}
    <a href="{{ route('auth.register') }}" class="btn btn-default">
        Register
    </a>
    {!! Form::close() !!}
@endif
