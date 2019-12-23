<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sis - @yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/simplex/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/icomoon/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('css/sweetalert/sweetalert2.min.css') }}">
	<link rel="icon" type="image/png" href="{{ asset('img/logos/ico.png') }}" />
</head>
<body>
	
	@include('partials.nav')

	<main>
		<div class="container">
			@yield('content')
		</div>
	</main>
	@include('partials.footer')

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
		$(function(){
			$('#linkSalir').on('click', function() {
	        	$('#formSalir').submit();
	        });
		});
	</script>
	
	@yield('scriptsFooter')	
</body>
</html>

