@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('success'))
	<div class="alert alert-success offset-md-3 col-md-6" role="alert">Event created successfully</div>
	@endif
	
	<div class="col-md-6 offset-md-3">
		<div class="card">
		<div class="card-header">
			<h1>Create New Event</h1>
		</div>
		<div class="card-body">
			<form method="POST" action="/events">
		{{ csrf_field ()}}
		<div class="form-group">
			<label for="eventTitle">Title</label>
			<input type="text" class='form-control' id="eventTitle" name="eventTitle">

			<label for="eventLocation">Location</label>
			<input type="text" class='form-control' id="eventLocation" name="eventLocation">

			<label for="eventDate">Date</label>
			<input type="date" class='form-control' id="eventDate" name="eventDate">

			<label for="eventTime">Time</label>
			<input type="time" class='form-control' id="eventTime" name="eventTime">

			<br>

			<button class="btn btn-primary" type="submit" class="form-control">Create Event</button>
		</div>
	</form>
		</div>
	</div>
	</div>
</div>
@endsection