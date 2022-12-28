@extends('layouts.app')
@section('title', 'Articles')
@section('content')
    <a>{{$flash}}</a>
    <h1>Articles list</h1>
    <a href="{{route('article.create')}}">Create new article</a>
    @foreach ($articles as $article)
        <h2>
            <a href="{{route('article.show', ['id' => $article->id])}}">{{$article->name}}</a>
        </h2>
        <a href="{{ route('article.destroy', ['id' => $article->id]) }}" data-confirm="Confirm deleting" data-method="delete" rel="nofollow">Delete</a>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{$articles->links()}}
@endsection