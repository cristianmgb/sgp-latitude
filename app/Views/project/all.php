<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Proyectos
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/proyectos', 'Proyectos') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col">
			<div class="card card-accent-primary">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Proyectos
				</div>
				<div class="card-body p-0">
					<table class="table table-responsive-sm table-striped table-sm">
						<thead>
							<tr class="text-center">
								<th>Nombre</th>
								<th>Valor</th>
								<th>Tiempo</th>
								<th>Creado</th>
								<th>Modificado</th>
								<th width="100px">Estado</th>
								<th width="100px">Acción</th>
							</tr>
						</thead>
						<tbody id="projects"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>