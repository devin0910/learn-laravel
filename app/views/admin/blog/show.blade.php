@section('title', 'Blog Post')

@section('content')
<h2>{{ $post->title }}</h2>
<p>{{ $post->content }}</p>
@stop