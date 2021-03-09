@extends('layouts.app')

@section('title', 'Información del Rol')

@section('breadcrumbs', Breadcrumbs::render('roles.show'))

@section('content')
    <div class="row justify-content-center">
    	<div class="col-2">
			<a role="button"
				class="btn btn-secondary btn-block"
				href="{{ route('roles.index') }}"
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
                                    <div class="h5 text-right text-capitalize">{{ $rol->name }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Creado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-secondary">{{ $rol->created_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Actualizado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-info">{{ $rol->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            @if ( count($permissions) <= 0 )
                            	<tr class="col border-bottom">
	                                <td>
	                                    <div class="small text-muted d-none d-md-block">Información</div>
	                                    <div class="h6 text-right">
	                                    	<span class="badge badge-warning">
	                                    		Este Rol aún no cuenta con permisos asigandos.
	                                    	</span>
	                                    </div>
	                                </td>
	                            </tr>
                            @else
	                            @foreach ($permissions as $permission)
	                            	<tr class="col border-bottom">
	                                    <td>
		                                    <div class="small text-muted d-none d-md-block">Permiso</div>
		                                    <div class="h6 text-right">
		                                    	<span class="badge badge-success">{{ $permission->name }}</span>
		                                    </div>
	                                	</td>
	                            	</tr>
	                            @endforeach
                            @endif
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
@endsection