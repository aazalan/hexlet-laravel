@extends('layouts.app')
@section('title', $article->name)
@section('content')
    <a href="{{ route('articles.edit', $article) }}">Edit article</a>
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>
    <div>
        <h3>Comments:</h3>
        @foreach ($article->comments()->get() as $comment)
            <a>{{ $comment->content }}</a>
            <a href="{{ route('articles.comments.edit', [$article, $comment]) }}">Edit</a>
            <a href="{{ route('articles.comments.destroy', [$article, $comment]) }}" data-confirm="Confirm deleting" data-method="delete" rel="nofollow">Delete comment</a>
            <br>
        @endforeach
    </div>
    <br>
    <div>
    {{ Form::model($article, ['route' => ['articles.comments.store', $article], 'method' => 'POST']) }}
        {{ Form::label('content', 'Comment content') }}<br>
        {{ Form::textarea('content') }}<br>
        {{ Form::submit('Post comment') }}
    {{ Form::close() }}
    </div>
@endsection