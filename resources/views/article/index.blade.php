@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>Articles list:</h1>
    @foreach ($articles as $article)
        <article>
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->body }}</p>
        </article>
    @endforeach
@endsection
