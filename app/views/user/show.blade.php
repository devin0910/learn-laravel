@section('title', 'User Profile')

@section('content')
<h2>Your Profile</h2>
<div class="well">
{{ $user->username }}
</div>
@stop
