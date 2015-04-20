@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Grid {{ $grid->id }}</h2>
			<h4>width: {{ $grid->cols }}</h4>
			<h4>height: {{ $grid->rows }}</h4>
			<h4>bombs: {{ $grid->bombs }}</h4>
		</div>
	</div>
@stop
