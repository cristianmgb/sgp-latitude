<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Asociados
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/asociados', 'Asociados') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<sgp-associate-table></sgp-associate-table>
<?= $this->endSection() ?>