@extends('layouts.app')

@section('title', 'Crear Permiso')

@section('breadcrumbs', Breadcrumbs::render('permissions.create'))

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
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <i class="fas fa-plus-circle"></i> Nuevo Permiso
                </div>
                <div class="card-body">
                	<form method="POST" action="{{ route('permissions.store') }}">
                		@method('POST')
                        @csrf
	                	<div class="row">
	        				<div class="col">
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
	        								href="{{ route('permissions.index') }}"
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
			        </form>
                </div>
            </div>
        </div>
        <div class="col-3">
        	<div class="card shadow-sm">
                <div class="card-header">
                    <i class="fas fa-exclamation-circle"></i> Recomendación
                </div>
                <div class="card-body">
                	<div class="form-group mb-3">
                		<p>
                			Los prefijos hacen referencia a la acción a la cual se tiene permiso y en el sistema
                			se definen de la siguiente manera:
                		</p>
                		<ul class="list-group mb-2 w-75 mx-auto">
						  	<li class="list-group-item">add_nombre_del_modulo</li>
						  	<li class="list-group-item">show_nombre_del_modulo</li>
						  	<li class="list-group-item">edit_nombre_del_modulo</li>
						  	<li class="list-group-item">delete_nombre_del_modulo</li>
						</ul>
						<p>
                			Se recomienda se mantenga dicha estructura para un nuevo permiso, el prefijo seguido
                			siempre de un '_' y por último el nombre del módulo.
                		</p>
                	</div>
               	</div>
            </div>
        </div>
    </div>
@endsection