@extends('layouts.app')

@section('title', 'Crear Rol')

@section('breadcrumbs', Breadcrumbs::render('roles.create'))

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
	<form method="POST" action="{{ route('roles.store') }}">
		@method('POST')
    	@csrf
	    <div class="row justify-content-center">
	        <div class="col-4">
	            <div class="card shadow-sm">
	                <div class="card-header">
	                    <i class="fas fa-plus-circle"></i> Nuevo Rol
	                </div>
	                <div class="card-body">
	                	<div class="form-group mb-3">
	                		<p>
	                			Se recomienda nombrar un nuevo rol en minúsculas y se usan dos palabras
	                			unir con un '_' ambas palabras.
	                		</p>
	                	</div>
	                    <div class="form-group">
	                        <label for="name">Nombre</label>
	                        <input
		                        id="name"
		                        name="name"
		                        type="text"
		                        placeholder="Nombre"
		                        value="{{ old('name') }}"
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
									<i class="far fa-save"></i> Crear
								</button>
    						</div>
    					</div>
	                </div>
	            </div>
	        </div>
	        <div class="col-2">
	            <div class="card shadow-sm">
	                <div class="card-header">
	                    <i class="fas fa-list"></i> Permisos disponibles
	                </div>
	                <div class="card-body">
	                	@foreach ($permissions as $permission)
	                		<div class="form-group form-check">
							    <input
								    type="checkbox"
								    name="permissions[]"
								    value="{{ $permission->name }}"
								    id="{{ $permission->id }}"
								    @if(array_key_exists($permission->id, old('permissions', []))) checked @endif
								    class="form-check-input @error('permissions') is-invalid @enderror"
							    >
							    <label class="form-check-label" for="{{ $permission->id }}">
							    	{{ $permission->name }}
							    </label>
								@error('permissions')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>
	            		@endforeach
	        		</div>
	            </div>
	        </div>
	    </div>
	</form>
@endsection