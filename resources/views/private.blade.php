@extends('layouts.app')
@section('title', 'Private page')
@section('content')
    <h1>Private page only for authenticated users</h1>
    {{ Form::open(['route' => ['user.logout'], 'method' => 'POST']) }}
        {{ Form::submit('Log out') }}
    {{ Form::close() }}
@endsection