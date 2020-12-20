<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('title') ?>
	Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col">
			<h1 class="card-title">{{ msg }}</h1>
		</div>
	</div>
<?= $this->endSection() ?>