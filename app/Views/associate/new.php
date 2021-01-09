<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Nuevo Asociado
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item">Asociados</li>
			<li class="breadcrumb-item"><?= anchor('admin/asociados', 'Nuevo Asociado') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-user-friends"></i> Nuevo Asociado
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
									<label class="col-md-3 col-form-label" for="identification">
										Identificación
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="identification" name="identification">
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
						<div class="form-group">
							<hr>
				      		<div class="row">
								<div class="col">
						        	<button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">
						        		<i class="far fa-times-circle"></i> Cancelar
						        	</button>
						        </div>
						        <div class="col">
						        	<button type="button" class="btn btn-block btn-primary">
						        		<i class="far fa-check-circle"></i> Guardar Póliza
						        	</button>
						        </div>
						    </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>