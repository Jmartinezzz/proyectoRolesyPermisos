{{-- si existen errores --}}
<div id="mensajes-error" class="alert alert-danger alert-dismissible">
		<section class="error"></section>
  	<button type="button" class="close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- si existen errores --}}
<div class="form-group">
	{{ Form::label('user', trans('app.user_name')) }}
	{{ Form::text('user', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('email', trans('app.user_email')) }}
	{{ Form::email('email', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('role', trans('app.user_role')) }}
	{{ Form::select('role',$roles, (isset($users))?null:$user->roles, ['class' => 'form-control']) }}
</div> 
