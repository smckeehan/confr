<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Confr
      @if(Auth::check())
        | {!! Auth::user()->instance->name !!}
      @endif
    </title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><b>Confr</b>
            @if(Auth::check())
              | <i>{!! Auth::user()->instance->name !!}</i>
            @endif
          </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/inbox"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;<span class="badge">{!! Auth::user()->unreadMessages()->count() !!}</span></a></li>
              <li><a href="/user/{!! Auth::user()->id !!}/posts"><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;<span class="badge">{!! Auth::user()->points() !!}</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->first_name !!} {!! Auth::user()->last_name !!} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/profile">Edit Profile</a></li>
                  <li><a href="/user/{!! Auth::user()->id !!}">View Profile</a></li>
                  <li><a href="/auth/logout">Logout</a></li>
                </ul>
              </li>
            </ul>
          @else
            <form class="navbar-form navbar-right" method="POST" action="/auth/login">
              {!! csrf_field() !!}
              <div class="form-group">
                <input type="text" name="email" placeholder="School Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
          @endif
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container-fluid">

      @yield('content')

      <hr>

      <footer>
        <p><a href="#">Confr Version 1.0 (UNRELEASED)</a></p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
