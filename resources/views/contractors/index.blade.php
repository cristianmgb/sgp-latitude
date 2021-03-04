@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('contractors.index'))

@section('content')
	<div class="row">
		<div class="col">
			<h2>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                </svg> Contratistas
			</h2>
		</div>
	</div>
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
							<i class="fa fa-align-justify"></i> Listado
						</div>
						<div class="col-2">
							<a class="btn btn-secondary btn-block" role="button" href="{{ route('contractors.create') }}">
								<i class="fas fa-plus-circle"></i> Nuevo
							</a>
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-striped table-bordered table-condensed table-hover table-sm mb-0 shadow-sm">
						<thead>
							<tr class="text-center text-white bg-secondary">
								<th>Nombre</th>
								<th>Estado</th>
								<th>Creado</th>
								<th>Actualizado</th>
								<th>Suspendido</th>
								<th width="120px">Acción</th>
							</tr>
						</thead>
						<tbody class="mb-0">
							@foreach ($contractors as $contractor)
								<tr class="text-center">
									<td>{{ $contractor->name }}</td>
									@if ($contractor->status == '1')
										<td><span class="badge badge-success">Activo</span></td>
									@else
										<td><span class="badge badge-danger">Inactivo</span></td>
									@endif
									<td><span class="badge badge-primary">{{ $contractor->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $contractor->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $contractor->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-contractors">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-contractors">
												<a
													rol="button"
													class="btn btn-outline-info"
													href="{{ route('contractors.show' , $contractor->id ) }}"
												>
													<i class="fas fa-eye"></i>
												</a>
												<a
													rol="button"
													class="btn btn-outline-success"
													href="{{ route('contractors.edit' , $contractor->id ) }}"
												>
													<i class="fas fa-edit"></i>
												</a>
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
		<div class="col">{{ $contractors->links() }}</div>
	</div>
@endsection