@extends('confr')

@section('content')
<div class="jumbotron">
  <div class="container">

    <form class="form-newpost" method="post" action="
    @if($community)
      /community/{!! $community->id !!}/new
    @else
      /post/new
    @endif
      ">
      {!! csrf_field() !!}
      <h2>
        @if($community)
          <b><a href="/community/{!! $community->id !!}">{!! $community->name !!}</a></b> >
        @endif
        New Post</h2>
      @if($error)
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          {!! $error !!}
        </div>
      @endif

      @if(!$community)
        <div class="form-group">
          <input type="text" class="form-control input-lg" name="community" placeholder="Community Number (TEMPORARY: Will update with names of Communities)">
        </div>
      @endif
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="title" placeholder="Title">
      </div>
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="url" placeholder="URL (Optional)">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">! Currently Disabled ! Upload Image (Optional)</label>
        <input type="file" id="exampleInputFile">
      </div>
      <textarea class="form-control input-lg" rows="5" name="description" placeholder="Post description..."></textarea>
      <br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Post!</button>
    </form>

    </div> <!-- /container -->
</div>
@endsection
