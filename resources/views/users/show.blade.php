@extends('layouts.app')

@section('title', 'Información del Usuario')

@section('breadcrumbs', Breadcrumbs::render('users.show'))

@section('content')
    <div class="row justify-content-center">
    	<div class="col-2">
			<a role="button"
				class="btn btn-secondary btn-block"
				href="{{ route('users.index') }}"
			>
				<i class="fas fa-undo-alt"></i> Regresar
			</a>
    	</div>
        <div class="col-4">
            <div class="card shadow-sm">
                <div class="card-header p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
					  	<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
					  	<path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
					</svg> Información del Usuario
                </div>
                <div class="card-body">
                	<table class="table table-condensed table-sm mb-0 shadow-sm">
						<tbody class="mb-0">
							<tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Nombres</div>
                                    <div class="h5 text-right">{{ $user->first_name }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Apellidos</div>
                                    <div class="h5 text-right">{{ $user->last_name }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Rol</div>
                                    <div class="h5 text-right">{{ $user->getRoleNames()[0] }}</div>
                                </td>
                            </tr>
                             <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Correo eletrónico</div>
                                    <div class="h5 text-right">{{ $user->email }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Estado</div>
                                    <div class="h5 text-right">
                                    	@if ($user->status == 1)
											<span class="badge badge-success">Activo</span>
										@else
											<span class="badge badge-danger">Inactivo</span>
										@endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Última IP</div>
                                    <div class="h5 text-right">{{ $user->last_ip }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Número de Sesiones</div>
                                    <div class="h5 text-right">{{ $user->login_count }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Correo eletrónico verificado</div>
                                    <div class="h5 text-right">{{ $user->email_verified_at }}</div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Creado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-secondary">{{ $user->created_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Actualizado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-info">{{ $user->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col border-bottom">
                                <td>
                                    <div class="small text-muted d-none d-md-block">Eliminado</div>
                                    <div class="h6 text-right">
                                    	<span class="badge badge-danger">{{ $user->deleted_at }}</span>
                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-sm">
                <div class="card-header p-3">
                    <i class="fas fa-list-ul"></i> Permisos del Usuario
                </div>
                <div class="card-body">
                	<table class="table table-condensed table-sm mb-0 shadow-sm">
						<tbody class="mb-0">
							@if($user->getAllPermissions()->count() > 0)
	                            @foreach ($user->getAllPermissions() as $permission)
									<tr class="col border-bottom">
		                                <td>
		                                    <div class="small text-muted d-none d-md-block">Nombre</div>
		                                    <div class="text-right">{{ $permission->name }}</div>
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