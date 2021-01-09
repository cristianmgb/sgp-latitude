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


<?= $this->endSection() ?>