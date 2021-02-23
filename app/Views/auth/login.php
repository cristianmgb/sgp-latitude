<?=$this->extend('layouts/auth')?>

<?=$this->section('title')?>
	Inicio de sesión
<?=$this->endSection()?>

<?=$this->section('content')?>
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card-group shadow">
				<div class="card p-4">
					<div class="card-body">
						<h1 class="text-center">Inicio de Sesión</h1>
						<?=form_open('login', 'autocomplete="off"')?>
							<?=csrf_field()?>
							<?php if (!empty(session()->getFlashdata('fail'))): ?>
								<div class="alert alert-danger mb-3" role="alert">
								  	<?=session()->getFlashdata('fail');?>
								</div>
							<?php endif?>
							<?php if (!empty(session()->getFlashdata('success'))): ?>
								<div class="alert alert-success mb-3" role="alert">
								  	<?=session()->getFlashdata('success');?>
								</div>
							<?php endif?>
							<div class="form-group mb-3">
								<?=form_label('Correo electrónico', 'email')?>
								<?=form_input(['type' => 'email', 'name' => 'email', 'placeholder' => 'Correo electrónico', 'class' => 'form-control', 'autocomplete' => 'off'], set_value('email'))?>
								<?php if (isset($validation)): ?>
									<span class="text-danger mt-2"><?=$validation->getError('email')?></span>
								<?php endif?>
							</div>
							<div class="form-group mb-3">
								<?=form_label('Contraseña', 'passoword')?>
								<?=form_password(['name' => 'password', 'placeholder' => 'Contraseña', 'class' => 'form-control', 'autocomplete' => 'off'])?>
								<?php if (isset($validation)): ?>
									<span class="text-danger mt-2"><?=$validation->getError('email')?></span>
								<?php endif?>
							</div>
							<div class="row">
								<div class="col">
									<hr>
									<button class="btn btn-dark btn-block" type="sumit">Iniciar</button>
								</div>
							</div>
						<?=form_close()?>
					</div>
				</div>
				<div class="card text-white bg-dark">
					<div class="card-body h-100">
						<div class="row align-items-center h-100">
							<i class="fas fa-server fa-7x text-white mx-auto"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?=$this->endSection()?>