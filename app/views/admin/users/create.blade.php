@section('title', 'Create User')

@section('content')
<h2>New User</h2>
{{ Form::open(array('url' => '/admin/users')) }}
<p>{{ Form::text('email', '', array('placeholder' => 'Email Address')); }}</p>
<p>{{ Form::text('username', '', array('placeholder' => 'Username')); }}</p>
<p>{{ Form::password('password', array('placeholder' => 'Password')); }}</p>
<p>{{ Form::label('is_admin', 'Admin user?'); }} {{ Form::checkbox('is_admin', '1', false); }}</p>
<p>{{ Form::submit('Create', array('class' => 'btn btn-primary')); }}</p>
{{ Form::close() }}
@stop