@section('title', 'Blog')

@section('content')
<h2>Posts</h2>
<a href="/admin/blog/create" class="btn btn-small btn-success">Add Post</a>
<hr>

<table class="table table-bordered table-striped">
<thead>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th></th>
	</tr>
</thead>
    @foreach ($posts as $post)
    	<tr>
    		<td>{{ $post->id }}</td>
    		<td>{{ $post->title }}</td>
        	<td>
                <div class="pull-right">
                    {{ Form::open(array('url' => '/admin/blog/'.$post->id)) }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <a href="/admin/blog/{{ $post->id }}" class="btn btn-small ">View</a> 
                    <a href="/admin/blog/{{ $post->id }}/edit" class="btn btn-small btn-primary">Edit</a>
                    {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger')); }}
                    {{ Form::close() }}
                </div>
            </td>
        </tr>
    @endforeach
</table>
{{ $posts->links() }}
@stop