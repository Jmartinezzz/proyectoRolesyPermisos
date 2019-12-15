@extends('principal')
@section('title',trans('app.user_list'))
@section('content')
<div class="row mb-2 justify-content-between">
	<div class="h2 w-100 mb-3">{{ trans('app.user_list') }} <span class="icon-users2"></span></div>
	<div class="col-4">
		<button id="btnAddUser" class="btn btn-primary" data-toggle="modal" data-target="#modaAddUser">
			{{ trans('app.new_user') }} <span class="icon-circle-with-plus"></span>
		</button>
		<!-- Modal -->
		<div class="modal fade" id="modaAddUser" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">{{ trans('app.add_user') }}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span class="icon-cancel-circle"></span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ...
		      </div>
		      <div class="modal-footer bg-secondary text-light">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('app.btn_cancel') }} <span class="icon-cross2"></span></button>
		        <button type="button" class="btn btn-primary">{{ trans('app.btn_save') }} <span class="icon-circle-with-plus"></span></button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal -->
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
				<td>{{ $user->user }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at->format('M-d-Y, h:i:s A') }}</td>
				<td>
					<button name="edit" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="{{ trans('app.edit') }}">
						<span class="icon-pencil" ></span>
					</button>
					<button name="delete" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title="{{ trans('app.delete') }}">
						<span class="icon-trash"></span>
					</button>					
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5" class="text-center">¡No Existen Registros de Usuarios!</td>
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
		  $('[data-toggle="tooltip"]').tooltip();
		   
		});
	</script>
@endsection
@endsection