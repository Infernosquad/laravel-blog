@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>Articles list:</h1>

    @if(Session::has('message'))
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif

    @foreach ($articles as $article)
        <article>
            <h1>
                <a href="{{ route('article.show',['article' => $article->id]) }}">
                    {{ $article->title }}
                </a>
            </h1>
            <p>{{ str_limit($article->body,1000) }}</p>
            <footer>
                <div>
                    Comments: {{ count($article->comments) }}
                </div>

                <div>
                    Created: {{ $article->created_at }}
                </div>
            </footer>
        </article>
    @endforeach

    {!! $articles->render() !!}
@endsection
