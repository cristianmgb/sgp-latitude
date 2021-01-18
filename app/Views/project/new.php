<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('title') ?>
	Nuevo Proyecto
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
	<div class="c-subheader">
		<ol class="breadcrumb border-0 m-0">
			<li class="breadcrumb-item">Inicio</li>
			<li class="breadcrumb-item">Proyectos</li>
			<li class="breadcrumb-item"><?= anchor('admin/proyectos/nuevo', 'Nuevo Proyecto') ?></li>
		</ol>
	</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col">
			<div class="card card-accent-primary">
				<div class="card-header">
					<i class="fa fa-user-plus"></i> Nuevo Proyecto
				</div>
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control" id="name" name="name">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control" id="name" name="name">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control" id="name" name="name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<hr>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-8">
								<div class="form-group">
						      		<div class="row">
										<div class="col">
								        	<button type="button" class="btn btn-block btn-secondary">
								        		<i class="far fa-times-circle"></i> Cancelar
								        	</button>
								        </div>
								        <div class="col">
								        	<button type="button" class="btn btn-block btn-primary">
								        		<i class="far fa-check-circle"></i> Guardar
								        	</button>
								        </div>
								    </div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>