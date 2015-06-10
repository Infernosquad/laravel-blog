@extends('layouts.master')

@section('title', 'Page Title')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <?php $options = ['class' => 'form-control'] ?>

    @if (isset($article))
        {!! Form::model($article, array('route' => array('article.update', $article->id),'method' => 'PUT')) !!}
    @else
        {!! Form::open(array('route' => 'article.store' ,'method' => 'POST')) !!}
    @endif

    <div class="form-group">
        <label for="title">
            Title
        </label>
        {!! Form::text('title',null,$options) !!}
    </div>
    <div class="form-group">
        <label for="title">
            Body
        </label>
        {!! Form::textarea('body',null,$options) !!}
    </div>
    {!! Form::submit('Submit',['class' => 'btn btn-success btn-block']) !!}
    {!! Form::close() !!}
@endsection
