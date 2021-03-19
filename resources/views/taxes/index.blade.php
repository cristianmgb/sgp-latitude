@extends('layouts.app')

@section('title', 'Listado de Impuestos')

@section('breadcrumbs', Breadcrumbs::render('taxes.index'))

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
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
				                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
				                    <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
				                </svg> Impuestos
				            </h3>
						</div>
						<div class="col-2">
							@if (auth()->user()->can('add_tax'))
								<a class="btn btn-success btn-sm btn-block" role="button" href="{{ route('taxes.create') }}">
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
								<th>Estado</th>
								<th>Creado</th>
								<th>Actualizado</th>
								<th>Suspendido</th>
								<th width="120px">Acción</th>
							</tr>
						</thead>
						<tbody class="mb-0">
							@foreach ($taxes as $tax)
								<tr class="text-center">
									<td>{{ $tax->name }}</td>
									@if ($tax->status == '1')
										<td><span class="badge badge-success">Activo</span></td>
									@else
										<td><span class="badge badge-danger">Inactivo</span></td>
									@endif
									<td><span class="badge badge-primary">{{ $tax->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $tax->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $tax->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-taxes">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-taxes">
												@if (auth()->user()->can('show_tax'))
													<a
														rol="button"
														class="btn btn-outline-info"
														href="{{ route('taxes.show' , $tax->id ) }}"
													>
														<i class="fas fa-eye"></i>
													</a>
												@endif
												@if (auth()->user()->can('edit_tax'))
													<a
														rol="button"
														class="btn btn-outline-success"
														href="{{ route('taxes.edit' , $tax->id ) }}"
													>
														<i class="fas fa-edit"></i>
													</a>
												@endif
												@if (auth()->user()->can('delete_tax'))
													<form method="POST"
														action="{{ route('taxes.destroy' , $tax->id ) }}"
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
		<div class="col">{{ $taxes->links() }}</div>
	</div>
@endsection