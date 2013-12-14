@extends('layouts.main')

@section('title', 'Password Reset')

@section('content')

@if (Session::has('error'))
    <div class="alert alert-error">{{ trans(Session::get('reason')) }}</div>
@elseif (Session::has('success'))
    <div class="alert alert-success">An e-mail has been sent, containing the reset link.</div>
@endif

<h2>Reset Password</h2>
{{ Form::open(array('url' => '/password/remind/')) }}
<p>{{ Form::text('email', '', array('placeholder' => 'Email address')); }}</p>
<p>{{ Form::submit('Submit', array('class' => 'btn btn-primary')); }} <a href="/" class="btn">Cancel</a></p>
{{ Form::close() }}
@stop