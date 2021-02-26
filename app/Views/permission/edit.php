<?=$this->extend('./layouts/dashboard')?>

<?=$this->section('title')?>
	Editar Permiso
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('permissions', 'Permisos')?></li>
			<li class="breadcrumb-item">Editar Permiso</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	//
<?=$this->endSection()?>