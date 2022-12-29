@extends('layouts.form')

@section('title', 'edit ' . $article->name)
@section('content')
{{ Form::model($article, ['route' => ['articles.update', $article], 'method' => 'PATCH']) }}
    @include('article.form')
    {{ Form::submit('update') }}
{{ Form::close() }}
@endsection