<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Editar Pólizas
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?= anchor('admin/', 'Inicio') ?></li>
			<li class="breadcrumb-item"><?= anchor('admin/polizas', 'Pólizas') ?></li>
			<li class="breadcrumb-item">Editar Pólizas</li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-policy-edit-form :id="<?= $policy['id'] ?>"></sgp-policy-edit-form>
<?= $this->endSection() ?>