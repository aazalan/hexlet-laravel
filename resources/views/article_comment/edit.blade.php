@extends('layouts.form')

@section('title', 'edit comment')
@section('content')
<h1>{{$article->name}}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{ Form::model($article, ['route' => ['articles.comments.update', $article, $comment], 'method' => 'PATCH']) }}
    {{ Form::label('content', 'Comment content') }}<br>
    {{ Form::textarea('content', $comment->content) }}<br>
    {{ Form::submit('Update comment') }}
{{ Form::close() }}
@endsection