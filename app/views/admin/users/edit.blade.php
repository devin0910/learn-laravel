@section('title', 'Edit User')

@section('content')
<h2>Edit user</h2>
{{ Form::open(array('url' => '/admin/users/'.$user->id)) }}
<input type="hidden" name="_method" value="PUT" />
<p>{{ Form::text('email', $user->email); }}</p>
<p>{{ Form::text('username', $user->username); }}</p>
<p>{{ Form::label('is_admin', 'Admin user?'); }} {{ Form::checkbox('is_admin', $user->is_admin, $user->is_admin); }}</p>
<p>{{ Form::submit('Edit', array('class' => 'btn btn-primary')); }}</p>
{{ Form::close() }}
@stop