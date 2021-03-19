@extends('layouts.app')

@section('title', 'Listado de Permisos')

@section('breadcrumbs', Breadcrumbs::render('permissions.index'))

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
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-checks" viewBox="0 0 16 16">
								  	<path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708l-2 2zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708l-2 2zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
								</svg> Permisos
							</h3>
						</div>
						<div class="col-2">
							@if (auth()->user()->can('add_permission'))
								<a class="btn btn-success btn-sm btn-block" role="button" href="{{ route('permissions.create') }}">
									<i class="fas fa-plus-circle"></i> Nuevo
								</a>
							@endif
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-striped table-bordered table-condensed table-hover table-sm mb-0 shadow-sm">
						<thead>
							<tr class="text-center text-white bg-secondary">
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Creado</th>
								<th>Actualizado</th>
								<th>Suspendido</th>
								<th width="120px">Acción</th>
							</tr>
						</thead>
						<tbody class="mb-0">
							@foreach ($permissions as $permission)
								<tr class="text-center">
									<td>{{ $permission->name }}</td>
									<td>{{ $permission->guard_name }}</td>
									<td><span class="badge badge-success">{{ $permission->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $permission->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $permission->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-permissions">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-permissions">
												@if (auth()->user()->can('show_permission'))
													<a
														rol="button"
														class="btn btn-outline-info"
														href="{{ route('permissions.show' , $permission->id ) }}"
													>
														<i class="fas fa-eye"></i>
													</a>
												@endif
												@if (auth()->user()->can('edit_permission'))
													<a
														rol="button"
														class="btn btn-outline-success"
														href="{{ route('permissions.edit' , $permission->id ) }}"
													>
														<i class="fas fa-edit"></i>
													</a>
												@endif
												@if (auth()->user()->can('delete_permission'))
													<form method="POST"
														action="{{ route('permissions.destroy' , $permission->id ) }}"
													>
								                    	@csrf
								                    	@method('DELETE')
								                    	<button type="submit"
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
	<div class="row">
		<div class="col">{{ $permissions->links() }}</div>
	</div>
@endsection