{{-- si existen errores --}}
<div id="mensajes-error" class="alert alert-danger alert-dismissible">
		<section class="error"></section>
  	<button type="button" class="close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- si existen errores --}}
<div class="form-group">
	{{ Form::label('user','Nombre de usuario:') }}
	{{ Form::text('user', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email:') }}
	{{ Form::email('email', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('role','Rol del usuario:') }}
	{{ Form::select('role',$roles, null, ['class' => 'form-control']) }}
</div> 
