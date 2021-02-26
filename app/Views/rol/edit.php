<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Editar Rol
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('roles', 'Roles')?></li>
			<li class="breadcrumb-item">Editar Rol</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<sgp-rol-edit-form :id="<?=$rol['id']?>"></sgp-rol-edit-form>
<?=$this->endSection()?>