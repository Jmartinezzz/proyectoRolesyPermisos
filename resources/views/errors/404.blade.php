@extends('errors.principal')
@section('titleError', 'Error 404')
@section('content')
	<div class="row">
		<div class="col-12 text-center">
			<img class="img-fluid" width="450" src="{{ asset('img/logos/like.jpg') }}">
		</div>
		<div class="col-12 text-center">
			<h2>
				Página no encontrada <a href="javascript:history.back()"><small>Regresar</small></a>
			</h2>
		</div>
	</div>
@endsection