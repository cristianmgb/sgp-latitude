<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Impuestos
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?= anchor('admin/', 'Inicio') ?></li>
			<li class="breadcrumb-item"><?= anchor('admin/impuestos', 'Impuestos') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-tax-form></sgp-tax-form>
<?= $this->endSection() ?>