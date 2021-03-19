@extends('layouts.app')

@section('title', 'Listado de Pólizas')

@section('breadcrumbs', Breadcrumbs::render('policies.index'))

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
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
				                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
				                    <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
				                </svg> Pólizas
							</h3>
						</div>
						<div class="col-2">
							@if (auth()->user()->can('add_policy'))
								<a class="btn btn-success btn-sm btn-block" role="button" href="{{ route('policies.create') }}">
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
							@foreach ($policies as $policy)
								<tr class="text-center">
									<td>{{ $policy->name }}</td>
									@if ($policy->status == '1')
										<td><span class="badge badge-success">Activo</span></td>
									@else
										<td><span class="badge badge-danger">Inactivo</span></td>
									@endif
									<td><span class="badge badge-primary">{{ $policy->created_at }}</span></td>
									<td><span class="badge badge-info">{{ $policy->updated_at }}</span></td>
									<td><span class="badge badge-danger">{{ $policy->deleted_at }}</span></td>
									<td>
										<div class="btn-group btn-group-sm" role="group" aria-label="actions-policies">
											<div class="btn-group btn-group-sm" role="group" aria-label="actions-policies">
												@if (auth()->user()->can('show_policy'))
													<a
														rol="button"
														class="btn btn-outline-info rounded-0"
														href="{{ route('policies.show' , $policy->id ) }}"
													>
														<i class="fas fa-eye"></i>
													</a>
												@endif
												@if (auth()->user()->can('edit_policy'))
													<a
														rol="button"
														class="btn btn-outline-success rounded-0"
														href="{{ route('policies.edit' , $policy->id ) }}"
													>
														<i class="fas fa-edit"></i>
													</a>
												@endif
												@if (auth()->user()->can('delete_policy'))
													<form method="POST"
														action="{{ route('policies.destroy' , $policy->id ) }}"
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
		<div class="col">{{ $policies->links() }}</div>
	</div>
@endsection