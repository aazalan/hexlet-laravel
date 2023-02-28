@extends('layouts.form')
@section('title', 'Login')
@section('content')
    <h1>Registration</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['route' => ['user.registration'], 'method' => 'POST']) }}
        {{ Form::label('email', 'Email')}}
        {{ Form::text('email') }}
        {{ Form::label('password', 'Password') }}
        {{ Form::text('password') }}
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', ['placeholder' => 'Write your full name...']) }}
        {{ Form::submit('Log in') }}
    {{ Form::close() }}
@endsection