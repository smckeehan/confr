@extends('confr')

@section('content')
<h3 style="float:left"><a href="/">My Newsfeed</a></h3>
<div class="newsfeed-buttons">
  <a class="btn btn-primary" href="/post/new" role="button"><span class="glyphicon glyphicon-plus"></span> New Post</a>
</div>

<table class="table table-striped">
  <tbody>
    <?php $count = 1; ?>
    @if($posts->count() == 0)
      <tr>
        <td align="center"><h4>Nothing is out here!</h4></td>
      </tr>
    @endif

    @foreach($posts as $post)
    <tr>
      <td><h3>{!! $count + Input::get('p') * 10 !!} <?php $count++; ?></h3></td>
      <td align="center">
        <div class="voting-icons">
          <a href="/post/{!! $post->id !!}/upvote"><span class="glyphicon glyphicon-menu-up gi-2x" style="color:black"></span></a>
          <h4>{!! $post->points !!}</h4>
          <a href="/post/{!! $post->id !!}/downvote"><span class="glyphicon glyphicon-menu-down gi-2x" style="color:black"></span></a>
        </div>
      </td>
      <td align="center"><a href="/community/{!! $post->community->id !!}"><h5>{!! $post->community->name !!}</h5></a></td>
      <td align="center"><span class="glyphicon glyphicon-film gi-5x"></span></td>
      <td>
        <!-- This is probably very bad, fix it before release -->
        <h4>
          @if($post->url)
            <a href="{!! $post->url !!}">{!! $post->title !!}</a>
          @else
            <a href="/post/{!! $post->id !!}">{!! $post->title !!}</a>
          @endif
        </h4>
        <p>{!! $post->description !!}</p>
        <p><b><a href="/post/{!! $post->id !!}">Comments ({!! $post->comments->count() !!})</a> | Submitted by: <a href="/user/{!! $post->user->id !!}">{!! $post->user->first_name !!} {!! $post->user->last_name !!} ({!! $post->user->points() !!})</a></b></p>
      </td>
    </tr>
    @endforeach

  </tbody>

</table>

@if($posts->count() == 10)
  <div class="text-center">
    @if(Input::get('p') > 0)
      <a href="/?p={!! Input::get('p') - 1 !!}" role="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Previous</a>
    @endif
    <a href="/?p={!! Input::get('p') + 1 !!}" role="button" class="btn btn-primary">Next <span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>
@endif

@endsection
