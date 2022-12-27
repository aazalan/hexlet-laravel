@extends('layouts.app')

@section('content')
    <a href="{{ route('article.edit', ['id' => $article->id]) }}">Edit article</a>
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>
@endsection