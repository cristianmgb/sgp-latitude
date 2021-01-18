<template>
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card card-accent-primary">
				<div class="card-header">
					<i class="fa fa-user-plus"></i> Nuevo Usuario
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="newAssociate">
						<div class="row">
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="first_name">
										Nombres
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="first_name" name="first_name">
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="last_name">
										Apellidos
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="last_name" name="last_name">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="phone">
										Teléfono
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="phone" name="phone">
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="email">
										Correo
									</label>
									<div class="col-md-9">
										<input type="email" class="form-control" id="email" name="email">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="password">
										Contraseña
									</label>
									<div class="col-md-9">
										<input type="password" class="form-control" id="password" name="password">
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="repet_password">
										Confirmar
									</label>
									<div class="col-md-9">
										<input type="password" class="form-control" id="repet_password" name="repet_password">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="rol">
										Rol
									</label>
									<div class="col-md-9">
										<select class="form-control" id="rol" name="rol">
											<option value="">Seleccionar</option>
											<option value="0">Activo</option>
											<option value="1">Inactivo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="state">
										Estado
									</label>
									<div class="col-md-9">
										<select class="form-control" id="state" name="state">
											<option value="">Seleccionar</option>
											<option value="0">Activo</option>
											<option value="1">Inactivo</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<hr>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-8">
								<div class="form-group">
						      		<div class="row">
										<div class="col">
								        	<button type="button" class="btn btn-block btn-secondary">
								        		<i class="far fa-times-circle"></i> Cancelar
								        	</button>
								        </div>
								        <div class="col">
								        	<button type="button" class="btn btn-block btn-primary">
								        		<i class="far fa-check-circle"></i> Guardar Usuario
								        	</button>
								        </div>
								    </div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name : 'user-form',
		data: () => ({
			
		}),
		methods: {
			//
		}
	};
</script>