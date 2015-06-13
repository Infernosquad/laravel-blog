@extends('layouts.master')

@section('title', 'Register')

@section('content')

    <?php $options = ['class' => 'form-control'] ?>

    {!! Form::open(array('route' => 'auth.register_check' ,'method' => 'POST')) !!}

    <div class="form-group">
        {!! Form::label('name','Username') !!}
        {!! Form::text('name',null,array_merge($options,['value' => old('email')])) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,array_merge($options,['value' => old('email')])) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',$options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation','Password confirmation') !!}
        {!! Form::password('password_confirmation',$options) !!}
    </div>

    {!! Form::submit('Submit',['class' => 'btn btn-success btn-block']) !!}
    {!! Form::close() !!}
@endsection
