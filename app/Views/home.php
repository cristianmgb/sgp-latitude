<?=$this->extend('layouts/app')?>

<?=$this->section('title')?>
	Inicio
<?=$this->endSection()?>

<?=$this->section('content')?>
	<?php if (!empty(session()->getFlashdata('success'))): ?>
		<div class="alert alert-success mb-3" role="alert">
		  	<?=session()->getFlashdata('success');?>
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <i class="far fa-times-circle"></i>
			</button>
		</div>
	<?php endif?>
	<sgp-widget-section></sgp-widget-section>
<?=$this->endSection()?>