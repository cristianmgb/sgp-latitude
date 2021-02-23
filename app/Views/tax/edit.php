<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Editar Impuesto
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('taxes', 'Impuestos')?></li>
			<li class="breadcrumb-item">Editar Impuesto</li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<sgp-tax-edit-form :id="<?=$tax['id']?>"></sgp-tax-edit-form>
<?=$this->endSection()?>