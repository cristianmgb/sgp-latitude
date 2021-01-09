<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Asociados
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/asociados', 'Asociados') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Asociados
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
<?= $this->endSection() ?>