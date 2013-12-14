<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    {{-- include all required stylesheets --}}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}

    <style type="text/css"> .navbar{ margin-bottom: 20px; }</style>

  </head>
<body>

    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
               
                @if(Auth::check())
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                </a>
                @endif

                <a class="brand" href="/admin/dashboard">Laravel</a>
                <div class="nav-collapse collapse" id="main-menu">
                    <ul class="nav" id="main-menu-left">

                      @if(Auth::check())
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/admin/users">All Users</a></li>
                          <li class="divider"></li>
                          <li><a href="/admin/users/create">Create User</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/admin/blog">All Posts</a></li>
                          <li class="divider"></li>
                          <li><a href="/admin/blog/create">Create Post</a></li>
                        </ul>
                      </li>
                      @endif

                    </ul>
                    <ul class="nav pull-right" id="main-menu-right">

                      @if(Auth::check())
                      <li><a rel="tooltip" href="/logout" title="Logout">Logout</a></li>
                      @endif
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">

      <div class="row-fluid">
          <div class="span12">

            {{-- include the errors partial --}}
            @include('admin.partials.errors')

            {{-- include content passed from controllers --}}
            @yield('content')
          </div>
      </div>

    </div>

    {{-- include all required javascripts --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/app.js') }}

</body>
</html>