@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')
	<div class="row">
		<div class="col">
			@if (session('message'))
			    <div class="alert alert-success" role="alert">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  	<i class="fas fa-times-circle"></i>
					</button>
			        {{ session('message') }}
			    </div>
			@endif
		</div>
	</div>
    <div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header px-3 py-2">
					<div class="row">
						<div class="col-10">
							<h3 class="mb-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
								  	<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
								</svg> Usuarios
							</h3>
						</div>
						<div class="col-2">
							@if (auth()->user()->can('add_user'))
								<a class="btn btn-success btn-sm btn-block" role="button" href="{{ route('users.create') }}">
									<i class="fas fa-plus-circle"></i> Nuevo
								</a>
							@endif
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-striped table-bordered table-condensed table-hover table-sm mb-0">
						<thead>
							<tr class="text-center text-white bg-secondary">
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Correo</th>
								<th>Estado</th>
								<th>Creado</th>
								<th>Actualizado</th>
								<th>Suspendido</th>
								<th width="120px">Acción</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<tr class="text-center">
									<td>{{ $user->first_name }}</td>
									<td>{{ $user->last_name }}</td>
									<td>{{ $user->email }}</td>
									@if ($user->status == 1)
										<td><span class="badge badge-success">Activo</span></td>
									@else
										<td><span class="badge badge-danger">Inactivo</span></td>
									@endif
									<td><span class="badge badge-success">{{ $user->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $user->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $user->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-users">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-users">
												@if (auth()->user()->can('show_user'))
													<a
														rol="button"
														class="btn btn-outline-info"
														href="{{ route('users.show', $user->id) }}"
													>
														<i class="far fa-eye"></i>
													</a>
												@endif
												@if (auth()->user()->can('edit_user'))
													<a
														rol="button"
														class="btn btn-outline-success"
														href="{{ route('users.edit', $user->id) }}"
													>
														<i class="fas fa-edit"></i>
													</a>
												@endif
												@if (auth()->user()->can('delete_user'))
													<form
														method="POST"
														action="{{ route('users.destroy', $user->id) }}">
								                    	@csrf
								                    	@method('DELETE')
								                    	<button
								                    		type="submit"
								                    		class="btn btn-sm btn-outline-danger rounded-0 btnDelete"
								                    		onclick="return confirm('¿ Está seguro de suspender el registro ?')"
								                    	>
								                    		<i class="far fa-trash-alt"></i>
								                    	</button>
								                  	</form>
												@endif
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection