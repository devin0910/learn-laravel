@section('title', 'Create Post')

@section('content')
<h2>New Post</h2>
{{ Form::open(array('url' => '/admin/blog')) }}
<p>{{ Form::text('title', '', array('placeholder' => 'Title')); }}</p>
<p>{{ Form::textarea('content', '', array('placeholder' => 'Post content')); }}</p>
<p>{{ Form::submit('Create', array('class' => 'btn btn-primary')); }}</p>
{{ Form::close() }}
@stop