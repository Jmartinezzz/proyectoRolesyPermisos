{{-- si existen errores --}}
<div id="mensajes-error" class="alert alert-danger alert-dismissible">
		<section class="error"></section>
  	<button type="button" class="close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- si existen errores --}}
<div class="form-group">
	{{ Form::label('name', trans('app.role_name')) }}
	{{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', trans('app.role_slug')) }}
	{{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('description', trans('app.role_description')) }}
	{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<h4>{{ trans('app.special_role') }}</h4>
<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} {{ trans('app.role_all_access') }}</label>	
	<label>{{ Form::radio('special', 'no-access') }} {{ trans('app.role_no_access') }} </label>	
</div>
<hr>
<h4>
	{{ trans('app.permissions_list') }}
	<a id="btnDesplegarLista" class=" btn-sm" data-toggle="collapse" href="#listadoRoles" aria-controls="listadoRoles" role="button">
		<span id="icono" class="icon-chevron-thin-down"></span>
	</a>
</h4>
<div class="form-group">
	<ul class="list-unstyled" id="listadoRoles">
		@foreach ($permissions as $permission)
			<li>
				<label>
					{{ Form::checkbox('permissions[]', $permission->id, null) }} {{ $permission->name }}
					<em class="text-muted">({{ $permission->description ?: trans('app.role_no_desc') }})</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
