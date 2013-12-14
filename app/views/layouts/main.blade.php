<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @section('css')
    {{-- include all required stylesheets --}}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
    @show
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

                <a class="brand" href="../">Laravel</a>
                <div class="nav-collapse collapse" id="main-menu">
                    <ul class="nav" id="main-menu-left">
                      <li><a href="/blog">Blog</a></li>
                    </ul>
                    <ul class="nav pull-right" id="main-menu-right">

                      @if(Auth::check())
                        @if(Auth::user()->is_admin())
                          <li><a href="/admin" title="Go to Admin area">Admin</a></li>
                        @endif
                      <li><a href="/user/profile" title="Your Profile">{{ Auth::user()->username }}</a></li>
                      <li><a rel="tooltip" href="/logout" title="Logout">Logout</a></li>
                      @elseif
                        <li><a rel="tooltip" href="/login" title="Login">Login</a></li>
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
            @include('partials.errors')

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