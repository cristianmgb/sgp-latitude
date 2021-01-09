<?= $this->extend('./layouts/dashboard') ?>

<?= $this->section('title') ?>
	Proyectos
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item"><?= anchor('admin/proyectos', 'Proyectos') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<?= $this->endSection() ?>