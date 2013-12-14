@section('title', 'Edit Post')

@section('content')
<h2>Edit Post</h2>
{{ Form::open(array('url' => '/admin/blog/'.$post->id)) }}
<input type="hidden" name="_method" value="PUT" />
<p>{{ Form::text('title', $post->title); }}</p>
<p>{{ Form::textarea('content', $post->content); }}</p>
<p>{{ Form::submit('Edit', array('class' => 'btn btn-primary')); }}</p>
{{ Form::close() }}
@stop