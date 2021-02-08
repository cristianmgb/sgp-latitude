<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Usuarios
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/usuarios', 'Usuarios') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-user-table></sgp-user-table>
<?= $this->endSection() ?>