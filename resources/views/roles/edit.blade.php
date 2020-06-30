@extends('principal')
@section('title',trans('app.role_edit'))
@section('activeRolesLink','active')
@section('content')
<div class="row mb-2">
	<div class="h2 w-100 mb-3">{{ trans('app.role_edit') }} <span class="icon-edit"></span></div>
	<div class="col-12">
		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <li>{{ $error }}</li>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			@endforeach
		@endif
	</div>
</div>
<div class="row">
	<div class="col-5">
		{{ Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'put']) }}
			@include('roles.formRoles')
			<a href="{{ route('roles.index') }}" class="btn btn-secondary border-dark mr-md-3">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></a>
			<button id="btnUpdateRole" type="submit" class="btn btn-primary">{{ trans('app.btn_save_changes') }} <span class="icon-save"></span></button>

		{{ Form::close() }}
	</div>
</div>


@section('scriptsFooter')
	<script>
		$(function(){
			$("#btnDesplegarLista").on('click', function(){
				$( "#icono" ).toggleClass('icon-chevron-thin-up');

			});
		})
	</script>
	
@endsection
@endsection