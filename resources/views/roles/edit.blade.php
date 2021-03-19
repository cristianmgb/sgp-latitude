@extends('layouts.app')

@section('title', 'Editar rol')

@section('breadcrumbs', Breadcrumbs::render('roles.edit'))

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
	<form method="POST" action="{{ route('roles.update', $rol->id) }}">
		@method('PUT')
    	@csrf
	    <div class="row justify-content-center">
	        <div class="col-4">
	            <div class="card shadow-sm">
	                <div class="card-header">
	                    <i class="fas fa-edit"></i> Editar Rol
	                </div>
	                <div class="card-body">
	                    <div class="form-group">
	                        <label for="name">Nombre</label>
	                        <input
		                        id="name"
		                        name="name"
		                        type="text"
		                        placeholder="Nombre"
		                        value="{{ $rol->name }}"
		                        class="form-control @error('name') is-invalid @enderror"
	                        >
	                        @error('name')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>
	                    <hr>
	                    <div class="row">
    						<div class="col">
    							<a role="button"
    								class="btn btn-secondary btn-block"
    								href="{{ route('roles.index') }}"
    							>
									<i class="fas fa-undo-alt"></i> Regresar
								</a>
    						</div>
    						<div class="col">
    							<button class="btn btn-primary btn-block" type="submit">
									<i class="fas fa-check"></i> Actualizar
								</button>
    						</div>
    					</div>
	                </div>
	            </div>
	        </div>
	        <div class="col-3">
	            <div class="card shadow-sm">
	                <div class="card-header">
	                    <i class="fas fa-list"></i> Permisos del Rol
	                </div>
	                <div class="card-body">
	            		@if ($permissions->count())
                            @foreach($permissions as $permission)
                                <div class="form-group form-check">
                                    {{ html()->label(html()->checkbox('permissions[]', in_array($permission->name, $rol->permissions->pluck('name')->all()), $permission->name)->id('permission-'.$permission->id) . ' ' . $permission->name)->for('permission-'.$permission->id) }}
                                    @error('permissions')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
                                </div>
                            @endforeach
                        @endif
	        		</div>
	            </div>
	        </div>
	    </div>
	</form>
@endsection