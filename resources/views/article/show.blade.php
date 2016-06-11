@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <article>
        <header>
            <h1>{{ $article->title }}</h1>
            <span class="label label-primary">Created: {{ $article->created_at }}</span>
        </header>
        <p>
            {{ $article->body }}
                        <img src="/media/{{ $article->media[0]->id}}/{{ $article->media[0]->file_name }}" alt="" height="100" width="100">

        </p>
        <footer>
            @include('tag.list', ['tags' => $article->tags])
        </footer>
    </article>

    <div>
        {!! Form::open(array('route' => array('article.destroy',$article->id))) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete this article', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}
        <a class="btn btn-primary" href="{{ route('article.edit',['article' => $article->id]) }}">
            Edit article
        </a>
    </div>


    @can('create-comment', $article)
        @include('comment.create', ['article' => $article->id])
    @endcan

    @include('comment.list', ['comments' => $article->comments])
@endsection
