@extends('confr')

@section('content')
<h3 style="float:left"><a href="/inbox">My Inbox</a></h3>
<div class="newsfeed-buttons">
  <a class="btn btn-primary" href="/inbox/new" role="button"><span class="glyphicon glyphicon-plus"></span> New Message</a>
</div>

<table class="table table-striped">
  <thead>
        <tr>
            <th>Subject</th>
            <th>Sent From</th>
            <th>Date</th>
        </tr>
    </thead>

  <tbody>

    @if($messages->count() == 0)
      <tr>
        <td align="center" colspan="3"><h4>You currently have no messages</h4></td>
      </tr>
    @endif

    @foreach($messages as $message)
    <tr>
      <td>
        <h5>
        @if(!$message->read)
          <span class="glyphicon glyphicon-envelope" style="color: gray; margin-right: 5px;"></span>
        @endif

        <a href="/inbox/{!! $message->id !!}">{!! $message->subject !!}</a></h5></td>
      <td><h5><a href="/user/{!! $message->sender->id !!}">{!! $message->sender->first_name !!} {!! $message->sender->last_name !!}</a></h5></td>
      <td><h5>Sent {!! $message->timeString() !!} ago</h5></td>
    </tr>
    @endforeach

  </tbody>

</table>

@if($messages->count() == 10)
  <div class="text-center">
    @if(Input::get('p') > 0)
      <a href="/inbox?p={!! Input::get('p') - 1 !!}" role="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Previous</a>
    @endif
    <a href="/inbox?p={!! Input::get('p') + 1 !!}" role="button" class="btn btn-primary">Next <span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>
@endif

@endsection
