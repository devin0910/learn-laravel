@extends('layouts.main')

@section('title', 'Login')

@section('content')
<h2>Login</h2>
{{ Form::open(array('url' => '/login')) }}
<p>{{ Form::text('email', '', array('placeholder' => 'Email address')); }}</p>
<p>{{ Form::password('password', array('placeholder' => 'Password')); }}</p>
<p>{{ Form::submit('Login', array('class' => 'btn btn-primary')); }}</p>
{{ Form::close() }}
<small><a href="/password/remind">Fogotten Password</a></small>
@stop