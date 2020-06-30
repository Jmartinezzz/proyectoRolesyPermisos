{{-- si existen errores --}}
<div id="mensajes-error" class="alert alert-danger alert-dismissible">
		<section class="error"></section>
  	<button type="button" class="close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- si existen errores --}}
<div class="form-group">
	{{ Form::label('name', trans('app.permission_name')) }}
	{{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', trans('app.permission_slug')) }}
	{{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('description', trans('app.permission_description')) }}
	{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<hr>
