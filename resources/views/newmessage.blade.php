@extends('confr')

@section('content')
<div class="jumbotron">
  <div class="container">

    <form class="form-newpost" method="post" action="/inbox/new">
      {!! csrf_field() !!}
      <h2>
        @if($user)
          <b><a href="/user/{!! $user->id !!}">{!! $user->first_name !!} {!! $user->last_name !!}</a></b> >
        @endif
        New Message</h2>
      @if($error)
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          {!! $error !!}
        </div>
      @endif

      @if(!$user)
        <select class="form-control input-lg" name="user">
          @foreach(Auth::user()->instance->users as $iUser)
            <option value="{!! $iUser->id !!}">{!! $iUser->first_name !!} {!! $iUser->last_name !!}</option>
          @endforeach
        </select>
        <br />
      @endif
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="subject" placeholder="Subject">
      </div>
      <textarea class="form-control input-lg" rows="5" name="message" placeholder="Message..."></textarea>
      <br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Send!</button>
    </form>

    </div> <!-- /container -->
</div>
@endsection
