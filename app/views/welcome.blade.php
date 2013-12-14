@section('title', 'Welcome')

@section('content')
<h2>Welcome, <small>{{ Auth::user()->username }}</small></h2>
<div class="well">
<p><img src="http://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}" alt="image" style="padding: 0 5px 5px 0;" /></p>
</div>
@stop