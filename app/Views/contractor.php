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
	<sgp-contractor-form></sgp-contractor-form>
<?= $this->endSection() ?>