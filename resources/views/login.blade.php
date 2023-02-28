@extends('layouts.form')
@section('title', 'Login')
@section('content')
    <h1>Login</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['route' => ['user.login'], 'method' => 'POST']) }}
        {{ Form::label('email', 'Email')}}
        {{ Form::text('email') }}
        {{ Form::label('password', 'Password') }}
        {{ Form::text('password') }}
        {{ Form::submit('Log in') }}
    {{ Form::close() }}
@endsection