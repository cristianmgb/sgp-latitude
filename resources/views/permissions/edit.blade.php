@extends('layouts.app')

@section('title', 'Editar Permiso')

@section('breadcrumbs', Breadcrumbs::render('permissions.edit'))

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
                    <i class="fas fa-edit"></i> Editar Permiso
                </div>
                <div class="card-body">
                	<form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                		@method('PUT')
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
				                        value="{{ $permission->name }}"
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
	        							<a class="btn btn-secondary btn-block" role="button" href="{{ route('permissions.index') }}">
											<i class="fas fa-undo-alt"></i> Regresar
										</a>
	        						</div>
	        						<div class="col">
	        							<button class="btn btn-info btn-block" type="submit">
											<i class="fas fa-check"></i> Actualizar
										</button>
	        						</div>
	        					</div>
			                </div>
			            </div>
			        </form>
                </div>
            </div>
        </div>
    </div>
@endsection