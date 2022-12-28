@extends('layouts.app')
@section('title', 'Articles')
@section('content')
    <a>{{$flash}}</a>
    <h1>Articles list</h1>
    <a href="{{route('articles.create')}}">Create new article</a>
    @foreach ($articles as $article)
        <h2>
            <a href="{{ route('articles.show', $article) }}">{{$article->name}}</a>
        </h2>
        <a href="{{ route('articles.destroy', $article) }}" data-confirm="Confirm deleting" data-method="delete" rel="nofollow">Delete</a>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{$articles->links()}}
@endsection