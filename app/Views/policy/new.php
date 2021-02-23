<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Nueva Póliza
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('policies', 'Pólizas')?></li>
			<li class="breadcrumb-item">Nueva Póliza</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<sgp-policy-form></sgp-policy-form>
<?=$this->endSection()?>