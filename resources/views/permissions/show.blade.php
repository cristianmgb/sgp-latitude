@extends('layouts.app')

@section('title', 'Información del Permiso')

@section('breadcrumbs', Breadcrumbs::render('permissions.show'))

@section('content')
    <div class="row justify-content-center">
    	<div class="col-2">
			<a role="button"
				class="btn btn-secondary btn-block"
				href="{{ route('permissions.index') }}"
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
                                    <div class="small text-muted d-none d-md-block">Nombre</div>
                                    <div class="h5 text-right">{{ $permission->name }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Creado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-secondary">{{ $permission->created_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Actualizado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-info">{{ $permission->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Eliminado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-danger">{{ $permission->deleted_at }}</span>
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