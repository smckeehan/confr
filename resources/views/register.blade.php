@extends('confr')

@section('content')
<div class="jumbotron">
  <div class="container">

    <form class="form-register" method="post" action="/register?s=1">
      {!! csrf_field() !!}
      <h2>Register for Confr</h2>
      @if(Input::get('s') > 0)
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Email or password do not match our records :(
        </div>
      @endif
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="firstName" placeholder="First Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="lastName" placeholder="Last Name">
      </div>
      <div class="form-group">
        <input type="email" class="form-control input-lg" name="email" placeholder="School Email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control input-lg" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password2" class="form-control input-lg" name="password2" placeholder="Password Again">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register!</button>
    </form>

    </div> <!-- /container -->
</div>
@endsection
