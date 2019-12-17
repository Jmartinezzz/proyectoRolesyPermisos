@extends('errors.principal')
@section('titleError', 'Error 403')
@section('content')
	<div class="row">
		<div class="col-12 text-center">
			<img class="img-fluid" width="450" src="{{ asset('img/logos/like.jpg') }}">
		</div>
		<div class="col-12 text-center">
			<h2>
				Esta acción no está autorizada. <a href="{{ route('users.index') }}"><small>Regresar</small></a>
			</h2>
		</div>
	</div>
@endsection