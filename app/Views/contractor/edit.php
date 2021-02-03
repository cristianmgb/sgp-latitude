<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Editar Contratista
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?= anchor('admin/', 'Inicio') ?></li>
			<li class="breadcrumb-item"><?= anchor('admin/contratistas', 'Contratistas') ?></li>
			<li class="breadcrumb-item">Editar Contratista</li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-contractor-edit-form :id="<?= $contractor['id'] ?>"></sgp-contractor-edit-form>
<?= $this->endSection() ?>