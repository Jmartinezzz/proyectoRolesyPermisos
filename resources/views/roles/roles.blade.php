@extends('principal')
@section('title',trans('app.roles_list'))
@section('content')
<div class="row mb-2 justify-content-between">
	<div class="h2 w-100 mb-3">{{ trans('app.roles_list') }} <span class="icon-user-tie"></span></div>
	@if (session('info'))
		<div class="alert alert-info alert-dismissible fade show w-100" role="alert">
		  <strong>{{ trans('app.attention') }},</strong> {{ session('info') }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
	<div class="col-4">
		@can('roles.create')
			<button id="btnAddUser" class="btn btn-primary" data-toggle="modal" data-target="#modalAddRole">
			{{ trans('app.new_role') }} <span class="icon-circle-with-plus"></span>
			</button>
			<!-- Modal -->
			<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">{{ trans('app.add_role') }}</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span class="icon-cancel-circle"></span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	{!! Form::open(['route' => 'roles.store', 'method' => 'post', 'id' => 'formAddRole']) !!}
			        	@include('roles.formRoles')
			      </div>
			      <div class="modal-footer bg-secondary text-light">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></button>
			        <button id="btnStoreRole" type="button" class="btn btn-primary">{{ trans('app.btn_save') }} <span class="icon-circle-with-plus"></span></button>
			          {!! Form::close() !!}
			      </div>
			    </div>
			  </div>
			</div>
			<!-- Modal -->
		@endcan
	</div>
	<div class="col-4">
		<form action="roles" class="form-inline float-right" method="GET">
      		<input name="searchRole" class="form-control mr-sm-2" type="search" placeholder="{{ trans('app.placeholder_search_role') }}" aria-label="Search">
      		<button class="btn btn-primary my-2 my-sm-0" type="submit">{{ trans('app.btn_search_role') }} <span class="icon-search"></span></button>
    	</form>
	</div>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>{{ trans('app.role') }}</th>
			<th>{{ trans('app.slug') }}</th>
			<th>{{ trans('app.description') }}</th>
			<th>{{ trans('app.creation') }}</th>
			<th>{{ trans('app.special') }}</th>
			<th>{{ trans('app.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@forelse($roles as $role)
			<tr>
				<td>{{ $role->id }}</td>
				<td>{{ $role->name }}</td>
				<td>{{ $role->slug }}</td>
				<td>{{ $role->description }}</td>
				<td>
					@isset($role->created_at)
					    {{ $role->created_at->format('M-d-Y, h:i:s A') }}
					@endisset
				</td>
				<td>
					@if($role->special == 'all-access')
						<span class="lead badge  badge-info">{{ $role->special }}</span>
					@elseif($role->special == 'no-access')
						<span class="badge badge-dark">{{ $role->special }}</span>
					@else
						<p class="font-italic">Null.</p>
					@endif
				</td>
				<td>
					@can('roles.edit')
						<button name="edit" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="{{ trans('app.edit') }}">
						<span class="icon-pencil" ></span>
					</button>
					@endcan
					@can('roles.destroy')
						{{ Form::open(['route' => ['roles.destroy',$role->id] ,'method' => 'delete', 'class' => 'd-inline']) }}
						<button type="button" class="btn btn-outline-primary btn-sm btn-eliminar" data-toggle="tooltip" title="{{ trans('app.delete') }}">
							<span class="icon-trash"></span>
						</button>	
						{{ Form::close() }}	
					@endcan				
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="7" class="text-center">{{ trans('app.if_no_exist_roles') }}</td>
			</tr>
		@endforelse
	</tbody>
	<tfoot>
		<tr>
			<td colspan="7">
				<div class="row justify-content-center">
					{{ $roles->links() }}
				</div>
			</td>
		</tr>
	</tfoot>
</table>
@section('scriptsFooter')
	<script>
		$(function () {
		  	$('[data-toggle="tooltip"]').tooltip();

			//agregar y mostrar errores de validacion en formulario de ingreso de roles
			$('#btnStoreRole').on('click', function(){
			  	var data = $('#formAddRole').serialize();			  
			  	var token = $('input[name=_token]').val();
			  	var route = "{{ route('roles.store') }}"; 			  	

			  	$.ajax({
			  		url: route,
			  		headers:{'X-CSRF-TOKEN':token},
			  		type: 'POST',
			  		dataType:"json",
			  		data:data,
			  		success:function(data){		
			  			$('#modalAddRole').modal('hide');	  			
		  				$("#formAddRole")[0].reset();
		  				Swal.fire(
						  '{{ trans('app.attention') }}',
						  '{{ trans('app.role_stored') }}',
						  'success'
						);
		  				location.href="{{  route('roles.index') }}";

			  		},
			  		error:function(data){
			  		console.log(data.responseJSON); 			  		
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
		   //agregar y mostrar errores de validacion en formulario de ingreso de roles

		   // eliminar role
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
		   // eliminar role
		   
		});
	</script>
@endsection
@endsection