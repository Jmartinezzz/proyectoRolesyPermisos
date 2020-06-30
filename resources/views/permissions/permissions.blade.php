@extends('principal')
@section('title',trans('app.permissions_list'))
@section('activePermissionsLink','active')
@section('content')
<div class="row mb-2 justify-content-between">
	<div class="h2 w-100 mb-3">{{ trans('app.permissions_list') }} <span class="icon-publish"></span></div>
	@if (session('info')){{-- mostramos mensajes de la variable info --}}
		<div class="alert alert-info alert-dismissible fade show w-100" role="alert">
		  <strong>{{ trans('app.attention') }},</strong> {{ session('info') }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
	<div class="col-4">
		{{-- mostramos el boton que despliega la ventana modal para agregar un nuevo permiso --}}
		@can('permissions.create')
			<button id="btnAddUser" class="btn btn-primary" data-toggle="modal" data-target="#modalAddPermission">
			{{ trans('app.new_permission') }} <span class="icon-circle-with-plus"></span>
			</button>
			<!-- Modal -->
			<div class="modal fade" id="modalAddPermission" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header" style="background: beige">
			        <h5 class="modal-title" id="exampleModalLabel">{{ trans('app.add_permission') }}</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span class="icon-cancel-circle"></span>
			        </button>
			      </div>
			      <div class="modal-body">
			        {!! Form::open(['route' => 'permissions.store', 'method' => 'post', 'id' => 'formAddPermissions']) !!}
			        	@include('permissions.formPermissions')
			      </div>
			      <div class="modal-footer" style="background: beige">
			        <button type="button" class="btn btn-secondary border-dark" data-dismiss="modal">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></button>
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
		<form action="permissions" class="form-inline float-right" method="GET">
      		<input name="searchPermission" class="form-control mr-sm-2" type="search" placeholder="{{ trans('app.placeholder_search_Permission') }}" aria-label="Search">
      		<button class="btn btn-primary my-2 my-sm-0" type="submit">{{ trans('app.search') }} <span class="icon-search"></span></button>
    	</form>
	</div>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>{{ trans('app.permission') }}</th>
			<th>{{ trans('app.slug') }}</th>
			<th>{{ trans('app.description') }}</th>
			<th>{{ trans('app.creation') }}</th>
			<th>{{ trans('app.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@forelse($permissions as $permission)
			<tr>
				<td>{{ $permission->id }}</td>
				<td>{{ $permission->name }}</td>
				<td>{{ $permission->slug }}</td>
				<td>{{ $permission->description }}</td>
				<td>{{ $permission->created_at->format('M-d-Y, h:i:s A') }}</td>
				<td>
					@can('permissions.edit')
						<a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="{{ trans('app.edit') }}">
							<span class="icon-pencil" ></span>
						</a>
					@endcan
					@can('permissions.destroy')
						{{ Form::open(['route' => ['permissions.destroy',$permission->id] ,'method' => 'delete', 'class' => 'd-inline']) }}
						<button type="button" class="btn btn-outline-primary btn-sm btn-eliminar" data-toggle="tooltip" title="{{ trans('app.delete') }}">
							<span class="icon-trash"></span>
						</button>
						{{ Form::close() }}	
					@endcan				
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="6" class="text-center">{{ trans('app.if_no_exist_permissions') }}</td>
			</tr>
		@endforelse
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6">
				<div class="row justify-content-center">
					{{ $permissions->links() }}
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
			  	var data = $('#formAddPermissions').serialize();			  
			  	var token = $('input[name=_token]').val();
			  	var route = "{{ route('permissions.store') }}"; 			  	

			  	$.ajax({
			  		url: route,
			  		headers:{'X-CSRF-TOKEN':token},
			  		type: 'POST',
			  		dataType:"json",
			  		data:data,
			  		success:function(data){		
			  			$('#modalAddPermission').modal('hide');	  			
		  				$("#formAddPermissions")[0].reset();
		  				Swal.fire(
						  '{{ trans('app.attention') }}',
						  '{{ trans('app.permission_stored') }}',
						  'success'
						);
		  				location.href="{{  route('permissions.index') }}";

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

		   // eliminar usuario
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
		   // eliminar usuario
		});
	</script>
@endsection
@endsection