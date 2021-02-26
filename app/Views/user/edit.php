<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Editar Usuario
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('users', 'Usuarios')?></li>
			<li class="breadcrumb-item">Editar Usuario</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<sgp-user-edit-form :id="<?=$user['id']?>"></sgp-user-edit-form>
<?=$this->endSection()?>