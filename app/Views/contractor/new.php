<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Nuevo Contratista
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('contractors', 'Contratistas')?></li>
			<li class="breadcrumb-item">Nuevo Contratista</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<sgp-contractor-form></sgp-contractor-form>
<?=$this->endSection()?>