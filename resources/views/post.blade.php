@extends('confr')

@section('content')

<h3><a href="/">{!! Auth::user()->instance->name !!}</a> > <a href="/community/{!! $post->community->id !!}">{!! $post->community->name !!}</a> > {!! $post->title !!}</h3>

@endsection
