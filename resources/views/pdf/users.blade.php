
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
<div class="row mb-2 justify-content-between">
	<div class="h2 w-100 mb-3">{{ trans('app.user_list') }} <span class="icon-users2"></span></div>
	
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>{{ trans('app.role') }}</th>
			<th>{{ trans('app.user') }}</th>
			<th>{{ trans('app.email') }}</th>
			<th>{{ trans('app.creation') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>
					@forelse($user->roles as $role)
						
						@if($role->name == 'Admin')
							<span class="badge badge-info">{{ $role->name }}</span>					
						@else
							<span class="badge badge-dark">{{ $role->name }}</span>					
						@endif
					@empty
					    {{ trans('app.without_role') }}
					@endforelse
				</td>
				<td>{{ $user->user }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at->format('M-d-Y, h:i:s A') }}</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6">
				<div class="row justify-content-center">
					este es el píe de pagina
				</div>
			</td>
		</tr>
	</tfoot>
</table>
