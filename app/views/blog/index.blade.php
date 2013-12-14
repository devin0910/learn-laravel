@section('title', 'Blog')

@section('content')
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <small><a href="/blog/{{ $post->id }}">view</a></small>
    @endforeach
    {{ $posts->links() }}
@stop