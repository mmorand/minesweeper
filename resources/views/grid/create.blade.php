@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>New Grid</h2>
			{!! Form::open(['url' => 'grid']) !!}

				<div class="form-group">
					{!! Form::label('cols', 'Width:') !!}
					{!! Form::input('number', 'cols', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('rows', 'Height:') !!}
					{!! Form::input('number', 'rows', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('bombs', 'Bombs:') !!}
					{!! Form::input('number', 'bombs', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Create Grid', ['class' => 'btn btn-primary form-control']) !!}
				</div>

			{!! Form::close() !!}			
		</div>
	</div>
@stop
