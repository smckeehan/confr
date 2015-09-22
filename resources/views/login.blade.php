@extends('confr')

@section('content')
<div class="jumbotron">
  <div class="container">

      <form class="form-signin" method="post" action="/auth/login">
        {!! csrf_field() !!}
        <h2 class="form-signin-heading">Login to Confr!</h2>
        @if(Input::get('fail') > 0)
          <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Email or password do not match our records :(
          </div>
        @endif
        <input type="email" name="email" class="form-control" placeholder="School Email" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <br />
        <a href="/forgot" class="btn btn-lg btn-block btn-default" role="button">Forgot password</a>
        <a href="/register" class="btn btn-lg btn-block btn-default" role="button">Register</a>
      </form>

    </div> <!-- /container -->
</div>
@endsection
