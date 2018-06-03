@extends('layouts.app')

@section('content')
	<div class="container">
	<h1>{{$event->title}}</h1>
	<p>Date: {{$event->date}}</p>
	<p>Time: {{$event->time}}</p>
	<p>Location: {{$event->location}}</p>
	@if(Auth::check())
		@if($status==0)
			<form method="POST" action="{{ route('eventsusers.store') }}">
				{{ csrf_field() }}
				<input type="hidden" name="event_id" value="{{ $event->id }}">
				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				<button type="submit" class="btn btn-success" onClick="confirm('Are you sure?')">Register</button>
			</form>
		@else
			<b>You have already registered for this event.</b>
		@endif
	@endif
	<br>
	<a href="{{ route('events.index') }}">see all events</a>
	</div>
@endsection