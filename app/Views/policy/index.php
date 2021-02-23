<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Pólizas
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('policies', 'Pólizas')?></li>
		</ol>
	</div>
<?=$this->endSection()?>

<?=$this->section('content')?>
	<div class="row">
		<div class="col">
			<div class="card card-accent-primary">
				<div class="card-header">
					<div class="row">
						<div class="col-10">
							<i class="fa fa-align-justify"></i> Pólizas
						</div>
						<div class="col-2">
							<?=anchor('policies/new', '<i class="fas fa-plus-circle"></i> Nuevo', 'class="btn btn-primary btn-block"')?>
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<sgp-policy-table></sgp-policy-table>
				</div>
			</div>
		</div>
	</div>
<?=$this->endSection()?>