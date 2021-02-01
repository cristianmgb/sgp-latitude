<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('title') ?>
	Nuevo Proyecto
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item">Proyectos</li>
			<li class="breadcrumb-item"><?= anchor('admin/proyectos/nuevo', 'Nuevo Proyecto') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col-10">
			<sgp-project-form></sgp-project-form>
		</div>
		<div class="col-2">
			<sgp-taxes-table-project></sgp-taxes-table-project>
		</div>
	</div>
<?= $this->endSection() ?>