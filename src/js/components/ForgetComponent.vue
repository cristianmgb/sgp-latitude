<template>
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card-group shadow">
				<div class="card text-white bg-dark">
					<div class="card-body h-100">
						<div class="row align-items-center h-100">
							<img :src="path + img" :alt="alt" class="w-25 mx-auto">
						</div>
					</div>
				</div>
				<div class="card p-4">
					<div class="card-body">
						<h1 class="text-center">{{ title }}</h1>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-key c-icon"></i>
								</span>
							</div>
							<input class="form-control" type="password" placeholder="Clave actual" id="old_password">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-key c-icon"></i>
								</span>
							</div>
							<input class="form-control" type="password" placeholder="Nueva contraseña" id="new_password">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-key c-icon"></i>
								</span>
							</div>
							<input class="form-control" type="password" placeholder="Repetir contraseña" id="repet_password">
						</div>
						<div class="row">
							<div class="col">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<a :href="btnLogin.url" class="btn btn-light btn-block" role="button">
									<i class="far fa-times-circle"></i> {{ btnLogin.title }}
								</a>
							</div>
							<div class="col">
								<a :href="btnChange.url" class="btn btn-dark btn-block" role="button">
									<i class="far fa-check-circle"></i> {{ btnChange.title }}
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import '../../img/forgot.png'
	export default {
	  	name : 'forget',
	  	data() {
	    	return {
	    		path      : $('#appUrl').val() + '/dist/img/',
	    		img       : 'forgot.png',
	    		title     : 'Recuperar clave',
				alt       : 'Recuperar clave',
				btnLogin  : {
					url   : 'login',
					title : 'Cancelar'
				},
				btnChange : {
					url   : 'change',
					title : 'Cambiar'
				}
	    	};
	  	},
	};
</script>