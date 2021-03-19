@extends('layouts.app')

@section('title', 'Listado de Roles')

@section('breadcrumbs', Breadcrumbs::render('roles.index'))

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
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
								  	<path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
								  	<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
								</svg> Roles
							</h3>
						</div>
						<div class="col-2">
							@if (auth()->user()->can('add_role'))
								<a class="btn btn-success btn-sm btn-block" role="button" href="{{ route('roles.create') }}">
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
							@foreach ($roles as $rol)
								<tr class="text-center">
									<td>{{ $rol->name }}</td>
									<td>{{ $rol->guard_name }}</td>
									<td><span class="badge badge-success">{{ $rol->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $rol->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $rol->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-roles">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-roles">
												@if (auth()->user()->can('show_role'))
													<a
														rol="button"
														class="btn btn-outline-info"
														href="{{ route('roles.show' , $rol->id ) }}"
													>
														<i class="fas fa-eye"></i>
													</a>
												@endif
												@if (auth()->user()->can('edit_role'))
													<a
														rol="button"
														class="btn btn-outline-success"
														href="{{ route('roles.edit' , $rol->id ) }}"
													>
														<i class="fas fa-edit"></i>
													</a>
												@endif
												@if (auth()->user()->can('delete_role'))
													<form method="POST"
														action="{{ route('roles.destroy' , $rol->id ) }}"
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
		<div class="col">{{ $roles->links() }}</div>
	</div>
@endsection