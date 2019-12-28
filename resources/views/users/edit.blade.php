@extends('principal')
@section('title',trans('app.user_edit'))
@section('content')
<div class="row mb-2">
	<div class="h2 w-100 mb-3">{{ trans('app.user_edit') }} <span class="icon-edit"></span></div>
	{{-- @if (session('info'))
		<div class="alert alert-info alert-dismissible fade show w-100" role="alert">
		  <strong>{{ trans('app.attention') }}</strong> {{ session('info') }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif --}}
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
		{{ Form::model($user, ['route' => ['users.update', $user->id],'method' => 'put']) }}
			@include('users.formUsers')
			<a href="{{ route('users.index') }}" class="btn btn-secondary border-dark mr-md-3">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></a>
			<button id="btnUpdateUser" type="submit" class="btn btn-primary">{{ trans('app.btn_save_changes') }} <span class="icon-save"></span></button>

		{{ Form::close() }}
	</div>
</div>


@section('scriptsFooter')
	
@endsection
@endsection