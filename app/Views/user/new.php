<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('title') ?>
	Nuevo Usuario
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item">Usuarios</li>
			<li class="breadcrumb-item"><?= anchor('admin/proyectos/nuevo', 'Nuevo Usuario') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-user-form></sgp-user-form>
<?= $this->endSection() ?>