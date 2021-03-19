@extends('layouts.app')

@section('title', 'Editar Asociado')

@section('breadcrumbs', Breadcrumbs::render('associates.edit'))

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
        <div class="col-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <i class="fas fa-edit"></i> Editar Asociado
                </div>
                <div class="card-body">
                	<form method="POST" action="{{ route('associates.update', $associate->id) }}">
                		@method('PUT')
                        @csrf
	                	<div class="row">
	        				<div class="col">
			                    <div class="form-group">
			                        <label for="name">Nombres</label>
			                        <input
				                        id="first_name"
				                        name="first_name"
				                        type="text"
				                        placeholder="Nombres"
				                        value="{{ $associate->first_name }}"
				                        class="form-control @error('first_name') is-invalid @enderror"
			                        >
			                        @error('first_name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
			                    </div>
			                </div>
			                <div class="col">
			                	<div class="form-group">
			                        <label for="name">Apellidos</label>
			                        <input
				                        id="last_name"
				                        name="last_name"
				                        type="text"
				                        placeholder="Apellidos"
				                        value="{{ $associate->last_name }}"
				                        class="form-control @error('last_name') is-invalid @enderror"
			                        >
			                        @error('last_name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
			                    </div>
			                </div>
			            </div>
			            <div class="row">
	        				<div class="col">
			                    <div class="form-group">
			                        <label for="name">Identificación</label>
			                        <input
				                        id="identification"
				                        name="identification"
				                        type="text"
				                        placeholder="Identificación"
				                        value="{{ $associate->identification }}"
				                        class="form-control @error('identification') is-invalid @enderror"
			                        >
			                        @error('identification')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
			                    </div>
			                </div>
			                <div class="col">
			                	<div class="form-group">
			                        <label for="name">Correo electrónico</label>
			                        <input
				                        id="email"
				                        name="email"
				                        type="email"
				                        placeholder="Correo electrónico"
				                        value="{{ $associate->email }}"
				                        class="form-control @error('email') is-invalid @enderror"
			                        >
			                        @error('email')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
			                    </div>
			                </div>
			            </div>
			            <div class="row">
	        				<div class="col">
			                    <div class="form-group">
			                        <label for="name">Teléfono</label>
			                        <input
				                        id="phone"
				                        name="phone"
				                        type="text"
				                        placeholder="Teléfono"
				                        value="{{ $associate->phone }}"
				                        class="form-control @error('phone') is-invalid @enderror"
			                        >
			                        @error('phone')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
			                    </div>
			                </div>
			                <div class="col">
			                	<div class="form-group">
			                        <label for="status">Estado</label>
			                        <select
			                        	id="status"
				                        name="status"
				                        class="form-control @error('status') is-invalid @enderror"
			                        >
								      	@foreach ($states as $key => $value)
								      		<option value="{{ $key }}" {{ ($associate->status == $key) ? 'selected' : '' }}>
								      			{{ $value }}
								      		</option>
			                        	@endforeach
								    </select>
								    @error('status')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
			                    </div>
			                </div>
			            </div>
			            <hr>
	                    <div class="row">
    						<div class="col">
    							<a role="button"
    								class="btn btn-secondary btn-block"
    								href="{{ route('associates.index') }}"
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
			        </form>
                </div>
            </div>
        </div>
    </div>
@endsection