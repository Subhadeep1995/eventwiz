@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="container">
			<div class="card-title"><h2>All Participants</h2></div>
		<div class="card-body">
			<ol class="list-group">
			 	@foreach($participants as $participant)
			 	<li class="list-item"><a href="admin/user/{{$participant->id}}/selected-events">{{ $participant->name }}</a></li>
 				@endforeach
 			</ol>
		</div>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<ul class="list-group">
			 	@foreach($events as $event)
			 	<li class="list-item">{{$event->title}}</li>
 				@endforeach
 			</ul>
		</div>
	</div>				
</div>
 
@endsection