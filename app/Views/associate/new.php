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
	<sgp-associate-form></sgp-associate-form>
<?= $this->endSection() ?>