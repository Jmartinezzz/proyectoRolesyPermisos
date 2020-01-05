@extends('principal')
@section('title',trans('app.user_list'))
@section('content')
<div class="row mb-2 justify-content-between">
	<div class="h2 w-100 mb-3">{{ trans('app.user_list') }} <span class="icon-users2"></span></div>
	@if (session('info'))
		<div class="alert alert-info alert-dismissible fade show w-100" role="alert">
		  <strong>{{ trans('app.attention') }},</strong> {{ session('info') }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
	<div class="col-4">
		@can('users.create')
			<button id="btnAddUser" class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">
			{{ trans('app.new_user') }} <span class="icon-circle-with-plus"></span>
			</button>
			<!-- Modal -->
			<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">{{ trans('app.add_user') }}</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span class="icon-cancel-circle"></span>
			        </button>
			      </div>
			      <div class="modal-body">
			        {!! Form::open(['route' => 'users.store', 'method' => 'post', 'id' => 'formAddUser']) !!}
			        	@include('users.formUsers')
			      </div>
			      <div class="modal-footer bg-secondary text-light">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></button>
			        <button id="btnStoreUser" type="button" class="btn btn-primary">{{ trans('app.btn_save') }} <span class="icon-circle-with-plus"></span></button>
			        {!! Form::close() !!}
			      </div>
			    </div>
			  </div>
			</div>
			<!-- Modal -->
		@endcan
	</div>
	<div class="col-4">
		<form action="users" class="form-inline float-right" method="GET">
      		<input name="searchEmail" class="form-control mr-sm-2" type="search" placeholder="{{ trans('app.placeholder_search') }}" aria-label="Search">
      		<button class="btn btn-primary my-2 my-sm-0" type="submit">{{ trans('app.search') }} <span class="icon-search"></span></button>
    	</form>
	</div>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>{{ trans('app.role') }}</th>
			<th>{{ trans('app.user') }}</th>
			<th>{{ trans('app.email') }}</th>
			<th>{{ trans('app.creation') }}</th>
			<th>{{ trans('app.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@forelse($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>
					@forelse($user->roles as $role)
						<span class="badge badge-info">{{ $role->name }}</span>
					@empty
					    {{ trans('app.without_role') }}
					@endforelse
				</td>
				<td>{{ $user->user }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at->format('M-d-Y, h:i:s A') }}</td>
				<td>
					@can('users.edit')
						<a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="{{ trans('app.edit') }}">
							<span class="icon-pencil" ></span>
						</a>
					@endcan
					@can('users.destroy')
						{{ Form::open(['route' => ['users.destroy',$user->id] ,'method' => 'delete', 'class' => 'd-inline']) }}
						<button type="button" class="btn btn-outline-primary btn-sm btn-eliminar" data-toggle="tooltip" title="{{ trans('app.delete') }}">
							<span class="icon-trash"></span>
						</button>
						{{ Form::close() }}	
					@endcan				
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5" class="text-center">{{ trans('app.if_no_exist_users') }}</td>
			</tr>
		@endforelse
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">
				<div class="row justify-content-center">
					{{ $users->links() }}
				</div>
			</td>
		</tr>
	</tfoot>
</table>
@section('scriptsFooter')
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();//activar tooltip bootstrap
			

			//agregar y mostrar errores de validacion en formulario de ingreso de usuarios
			$('#btnStoreUser').on('click', function(){
			  	var data = $('#formAddUser').serialize();			  
			  	var token = $('input[name=_token]').val();
			  	var route = "{{ route('users.store') }}"; 			  	

			  	$.ajax({
			  		url: route,
			  		headers:{'X-CSRF-TOKEN':token},
			  		type: 'POST',
			  		dataType:"json",
			  		data:data,
			  		success:function(data){		
			  			$('#modalAddUser').modal('hide');	  			
		  				$("#formAddUser")[0].reset();
		  				Swal.fire(
						  '{{ trans('app.attention') }}',
						  '{{ trans('app.user_stored') }}',
						  'success'
						);
		  				location.href="{{  route('users.index') }}";

			  		},
			  		error:function(data){ 			  		
			  			$('.close').on('click', function(){
			  				$('#mensajes-error').hide();
			  			});

			  			var errores="";

			  			if(typeof data.responseJSON !== 'undefined'){
			  				$.each(data.responseJSON.errors, function(i, valor){
				  				errores += "<li>" +valor + "</li>";
				  			});

				  			$('#mensajes-error').show();			  			
				  			
				  			$('.error').html(errores);
			  			}			  		
			  		},
			  	})
		  	});
		   //agregar y mostrar errores de validacion en formulario de ingreso de usuarios

		   // eliminar registro
		    $('.btn-eliminar').on('click', function(e){
		    	Swal.fire({
				  title: '{{ trans('app.btnEliminarTitle') }}',
				  text: "{{ trans('app.btnEliminarText') }}",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: '{{ trans('app.btnElliminarConfirm') }}',
				  cancelButtonText: '{{ trans('app.btn_cancel') }}'
				}).then((result) => {
				  if (result.value) {
				    $(this).parents('form:first').submit();	
				  }
				})		      
		        	      
		    })
		   // eliminar registro
		});
	</script>
@endsection
@endsection