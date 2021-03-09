@extends('layouts.app')

@section('title', 'Listado de Asociados')

@section('breadcrumbs', Breadcrumbs::render('associates.index'))

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
				<div class="card-header">
					<div class="row">
						<div class="col-10">
							<h2>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
				                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
				                </svg> Asociados
							</h2>
						</div>
						<div class="col-2">
							@if(auth()->user()->can('add_associate'))
								<a class="btn btn-secondary btn-block" role="button" href="{{ route('associates.create') }}">
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
								<th>Apellidos</th>
								<th>Estado</th>
								<th>Creado</th>
								<th>Actualizado</th>
								<th>Suspendido</th>
								<th width="120px">Acción</th>
							</tr>
						</thead>
						<tbody class="mb-0">
							@foreach ($associates as $associate)
								<tr class="text-center">
									<td>{{ $associate->first_name }}</td>
									<td>{{ $associate->last_name }}</td>
									@if ($associate->status == '1')
										<td><span class="badge badge-success">Activo</span></td>
									@else
										<td><span class="badge badge-danger">Inactivo</span></td>
									@endif
									<td><span class="badge badge-primary">{{ $associate->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $associate->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $associate->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-associates">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-associates">
												@if(auth()->user()->can('show_associate'))
													<a
														rol="button"
														class="btn btn-outline-info rounded-0"
														href="{{ route('associates.show' , $associate->id ) }}"
													>
														<i class="fas fa-eye"></i>
													</a>
												@endif
												@if (auth()->user()->can('edit_associate'))
													<a
														rol="button"
														class="btn btn-outline-success rounded-0"
														href="{{ route('associates.edit' , $associate->id ) }}"
													>
														<i class="fas fa-edit"></i>
													</a>
												@endif
												@if (auth()->user()->can('delete_associate'))
													<form
														method="post"
														action="{{ route('associates.destroy' , $associate->id ) }}"
													>
								                    	@csrf
								                    	@method('DELETE')
								                    	<button
								                    		type="submit"
								                    		class="btn btn-sm btn-outline-danger rounded-0"
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
		<div class="col">{{ $associates->links() }}</div>
	</div>
@endsection