<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('title') ?>
	Roles
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/roles', 'Roles') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-rol-form></sgp-rol-form>
<?= $this->endSection() ?>