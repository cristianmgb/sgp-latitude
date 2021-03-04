@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('associates.show'))

@section('content')
    <div class="row justify-content-center">
    	<div class="col-2">
			<a role="button"
				class="btn btn-secondary btn-block"
				href="{{ route('associates.index') }}"
			>
				<i class="fas fa-undo-alt"></i> Regresar
			</a>
    	</div>
        <div class="col-4">
            <div class="card shadow-sm">
                <div class="card-header p-3">
                    <i class="fas fa-edit"></i> Información detallada
                </div>
                <div class="card-body">
                	<table class="table table-condensed table-sm mb-0 shadow-sm">
						<tbody class="mb-0">
							<tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Nombres</div>
                                    <div class="h5 text-right">{{ $associate->first_name }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Apellidos</div>
                                    <div class="h5 text-right">{{ $associate->last_name }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Identificación</div>
                                    <div class="h5 text-right">{{ $associate->identification }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Teléfono</div>
                                    <div class="h5 text-right">{{ $associate->phone }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Correo electrónico</div>
                                    <div class="h5 text-right">{{ $associate->email }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Estado</div>
                                    <div class="h5 text-right">
                                    	@if ($associate->status == 1)
											<span class="badge badge-success">Activo</span>
										@else
											<span class="badge badge-danger">Inactivo</span>
										@endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Creado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-secondary">{{ $associate->created_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Actualizado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-info">{{ $associate->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Eliminado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-danger">{{ $associate->deleted_at }}</span>
                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
@endsection