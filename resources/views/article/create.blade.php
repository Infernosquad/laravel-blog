@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <?php $options = ['class' => 'form-control'] ?>

    @if (isset($article))
        <?php $tags = $article->tags->implode('tag',',')  ?>
        {!! Form::model($article, array('route' => array('article.update', $article->id),'method' => 'PUT','files' => true)) !!}
    @else
        <?php $tags = '' ?>
        {!! Form::open(array('route' => 'article.store' ,'method' => 'POST','files' => true)) !!}
    @endif

    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,$options) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Body') !!}
        {!! Form::textarea('body',null,$options) !!}
    </div>
    <div class="form-group">
        {!! Form::label('media','Media') !!}
        {!! Form::file('media') !!}
    </div>
    <div class="form-group">
        {!! Form::label('fileLink','File Link') !!}
        {!! Form::text('fileLink',null,$options) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags','Tags') !!}
        <input name="tags" type="hidden" data-role="tagsinput" value="{{ $tags }}">
    </div>
    {!! Form::submit('Submit',['class' => 'btn btn-success btn-block']) !!}
    {!! Form::close() !!}
@endsection
