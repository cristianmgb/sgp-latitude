<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('title') ?>
	Contratistas
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/contratistas', 'Contratistas') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-10">
							<span class="mt-2">
								<i class="fa fa-align-justify"></i> Contratistas
							</span>
						</div>
						<div class="col-2">
							<button class="btn btn-sm btn-block btn-primary" type="button" data-toggle="modal" data-target="#newContractor">
								Nuevo Contratista
							</button>
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-responsive-sm table-striped table-sm">
						<thead>
							<tr class="text-center">
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Creado</th>
								<th>Modificado</th>
								<th width="100px">Estado</th>
								<th width="100px">Acción</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Superadmin</td>
								<td>xxxxxxxxxxxxxxxx</td>
								<td><span class="badge badge-secondary">01/09/2021</span></td>
								<td><span class="badge badge-info">01/09/2021</span></td>
								<td><span class="badge badge-success">Active</span></td>
								<td>
									<div class="btn-group btn-group-sm" role="group" aria-label="tools">
										<button class="btn btn-outline-info" type="button">
											<i class="far fa-edit"></i>
										</button>
										<button class="btn btn-outline-danger" type="button">
											<i class="far fa-trash-alt"></i>
										</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="newContractor" tabindex="-1" aria-labelledby="newContractor" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		     	<div class="modal-header">
		        	<h5 class="modal-title" id="newContractor">
		        		<i class="fas fa-people-carry"></i> Nuevo Contratista
		        	</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<i class="far fa-times-circle"></i>
		        	</button>
		      	</div>
		      	<div class="modal-body pb-0">
		        	<form action="">
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="description">Descripción</label>
							<textarea class="form-control" id="description" name="description" rows="8" placeholder="Descripción del contratista"></textarea>
						</div>
						<div class="form-group">
							<label for="state">Estado</label>
							<select class="form-control" id="state" name="state">
								<option value="">Seleccionar</option>
								<option value="0">Activo</option>
								<option value="1">Inactivo</option>
							</select>
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
						        		<i class="far fa-check-circle"></i> Guardar Contratista
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