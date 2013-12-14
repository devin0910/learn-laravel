@section('title', 'View User')

@section('content')
<h2>View User</h2>
<ul class="thumbnails">
    <li class="span5">
    	<div class="thumbnail">
    		<img src="http://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?s=200" style="width: 100%; max-width: 200px;" alt="image" />
    		<div class="caption" style="text-align:center;">
            	<p><strong>{{ $user->username }}</strong><br />{{ $user->email }}</p>
            	<p>
            		{{ Form::open(array('url' => '/admin/users/'.$user->id)) }}
					<input type="hidden" name="_method" value="DELETE" />
					<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-small btn-primary">Edit</a>
					{{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger')); }}
					{{ Form::close() }}
            	</p>
        	</div>
    	</div>
    </li>
</ul>
@stop