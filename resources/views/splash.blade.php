@extends('confr')

@section('content')

<div class="jumbotron">
  <div class="container">
    <h1>Welcome to Confr!</h1>
    <p>Confr is a new community-based platform for sharing...anything! We automatically place you into a community based on your school's email address, check to see if your school is supported!</p>
    <form class="form-inline" method="post" action="/">
      {!! csrf_field() !!}
      @if($submitted && $success)
        <div class="alert alert-success" role="alert">{!! $msg !!}</div>
      @elseif($submitted)
        <div class="alert alert-danger" role="alert">{!! $msg !!}</div>
      @endif
      <div class="form-group">
        <label class="sr-only" for="emailCheck">School email address</label>
        <input type="email" class="form-control input-lg" name="emailCheck" id="emailCheck" placeholder="School Email" value="{!! Input::get('emailCheck') !!}">
      </div>
      <button type="submit" class="btn btn-lg btn-primary">Check!</button>
    </form>
  </div>
</div>

@endsection
