@extends('layouts.app')

@section('content')
	<div class="container">
		@foreach($events as $event)
	<h1>{{$event->title}}</h1>
	<p>Date: {{$event->date}}</p>
	<p>Time: {{$event->time}}</p>
	<p>Location: {{$event->location}}</p>
	<a href="/events/{{$event->id}}">Details</a>
	@endforeach
	</div>
@endsection