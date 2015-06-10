@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <article>
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->body }}</p>
        <div>
            {!! Form::open(array('route' => array('article.destroy',$article->id))) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete this article', array('class' => 'btn btn-danger')) !!}
            {!! Form::close() !!}
            <a class="btn btn-primary" href="{{ route('article.edit',['article' => $article->id]) }}">
                Edit article
            </a>
        </div>
    </article>
@endsection
