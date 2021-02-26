<?=$this->extend('layouts/app')?>

<?=$this->section('title')?>
	Nuevo Proyecto
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('projects', 'Proyectos')?></li>
			<li class="breadcrumb-item">Nuevo Proyecto</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<div class="row">
		<div class="col">
			<sgp-project></sgp-project>
		</div>
	</div>
<?=$this->endSection()?>