@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <article>
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->body }}</p>
    </article>
@endsection
