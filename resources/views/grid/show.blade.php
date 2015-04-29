@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Grid {{ $grid->id }}</h2>
			{{ $message or '' }}
			<table>
				@for( $i = 1; $i <= $grid->height; $i++ )
					<tr>
						@for( $j = 1; $j <= $grid->width; $j++ )
							<td align="center" width="25" height="25">
								@foreach ($grid->squares as $square)
									@if( ($square->x == (string)$i) && ($square->y == (string)$j) )
										@if($square->discover == false)
											{!! Form::open(['url' => 'grid/square/']) !!}
												{!! Form::hidden('x', $i) !!}
												{!! Form::hidden('y', $j) !!}
												{!! Form::submit('x') !!}
											{!! Form::close() !!}
										@else
											{{ $square->content != '0' ? $square->content : '' }}
										@endif
									@endif
								@endforeach
							</td>
						@endfor
					</tr>
				@endfor
			</table>

			<h4>width: {{ $grid->width }}</h4>
			<h4>height: {{ $grid->height }}</h4>
			<h4>bombs: {{ $grid->bombs }}</h4>
		</div>
	</div>
@stop
