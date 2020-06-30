@extends('principal')
@section('title',trans('app.permission_edit'))
@section('activePermissionLink','active')
@section('content')
<div class="row mb-2">
	<div class="h2 w-100 mb-3">{{ trans('app.permission_edit') }} <span class="icon-publish"></span><span class="icon-edit"></span></div>
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
		{{ Form::model($permission, ['route' => ['permissions.update', $permission->id],'method' => 'put']) }}
			@include('permissions.formPermissions')
			<a href="{{ route('permissions.index') }}" class="btn btn-secondary border-dark mr-md-3">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></a>
			<button id="btnUpdatePermission" type="submit" class="btn btn-primary">{{ trans('app.btn_save_changes') }} <span class="icon-save"></span></button>

		{{ Form::close() }}
	</div>
</div>


@section('scriptsFooter')
	
@endsection
@endsection