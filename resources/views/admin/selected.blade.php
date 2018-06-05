@extends('layouts.app')

@section('content')
<div class="container">
	<ol>
		@foreach($events as $event)
			<li>{{$event->title}}</li>
		@endforeach
	</ol>
</div>
@endsection