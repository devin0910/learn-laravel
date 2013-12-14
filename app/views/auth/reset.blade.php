@extends('layouts.main')

@section('title', 'Reset Password')

@section('content')

@if (Session::has('error'))
    <div class="alert alert-error">{{ trans(Session::get('reason')) }}</div>
@endif

<h2>Reset Password</h2>
{{ Form::open(array('url' => '/password/reset/'.$token)) }}
<input type="hidden" name="token" value="{{ $token }}">
<p><input type="text" name="email" placeholder="Email address"></p>
<p><input type="password" name="password" placeholder="Password"></p>
<p><input type="password" name="password_confirmation" placeholder="Confirm Password"></p>
<p>{{ Form::submit('Submit', array('class' => 'btn btn-primary')); }} <a href="/" class="btn">Cancel</a></p>
{{ Form::close() }}
@stop