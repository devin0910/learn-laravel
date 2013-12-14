@section('title', 'Users')

@section('content')
<h2>Users</h2>

<div class="row-fluid">
	<ul class="thumbnails">
	@foreach($users as $user)
	    <li class="span3">
	    	<div class="thumbnail">
	    		<img src="http://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?s=200" style="width: 100%; max-width: 200px;" alt="image" />
	    		<div class="caption" style="text-align:center;">
	            	<p><strong>
	            		{{ $user->username }} 
	            		@if($user->is_admin())
	            			<span class="label label-small label-info">Admin</span>
	            		@endif
	            	</strong></p>
	            	<p><a href="/admin/users/{{ $user->id }}" class="btn btn-small btn-primary">View</a> <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-small">Edit</a></p>
	        	</div>
	    	</div>
	    </li>
	@endforeach
	</ul>
</div>
{{ $users->links() }}
@stop