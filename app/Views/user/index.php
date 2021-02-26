<?=$this->extend('./layouts/app')?>

<?=$this->section('title')?>
	Usuarios
<?=$this->endSection()?>

<?=$this->section('breadcrumb')?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item"><?=anchor('/home', 'Inicio')?></li>
			<li class="breadcrumb-item"><?=anchor('users', 'Usuarios')?></li>
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
							<i class="fa fa-align-justify"></i> Usuarios
						</div>
						<div class="col-2">
							<?=anchor('users/new', '<i class="fas fa-plus-circle"></i> Nuevo', 'class="btn btn-primary btn-block"')?>
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-responsive-sm table-striped table-sm">
						<thead>
							<tr class="text-center">
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Rol</th>
								<th>Correo</th>
								<th>Creado</th>
								<th>Modificado</th>
								<th width="100px">Estado</th>
								<th width="100px">Acción</th>
							</tr>
						</thead>
						<sgp-user-table></sgp-user-table>
					</table>
				</div>
			</div>
		</div>
	</div>
<?=$this->endSection()?>