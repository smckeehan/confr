@extends('confr')

@section('content')
<h3 style="float:left"><a href="/inbox">Inbox</a> > {!! $message->subject !!}</h3>
<div class="newsfeed-buttons">
  <a class="btn btn-primary" href="/inbox/new" role="button"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
</div>

<br /><br /><br />

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Sent from <a href="/user/{!! $message->sender->id !!}">{!! $message->sender->first_name !!} {!! $message->sender->last_name !!}</a> {!! $message->timeString() !!} ago</h3>
      </div>
      <div class="panel-body">
        {!! $message->message !!}
      </div>
    </div>
  </div>




@endsection
