<template>
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card-group shadow">
				<div class="card p-4">
					<div class="card-body">
						<h1 class="text-center">{{ title }}</h1>
						<form @submit.prevent="" accept-charset="UTF-8">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-envelope c-icon"></i>
									</span>
								</div>
								<input
									type="text"
									class="form-control"
									name="email"
									placeholder="Email"
								>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-key c-icon"></i>
									</span>
								</div>
								<input
									type="password"
									class="form-control"
									name="password"
									v-model="password"
								>
							</div>
							<div class="row">
								<div class="col">
									<button class="btn btn-dark btn-block" type="sumit">
										{{ btnLogin.title }}
									</button>
									<hr>
								</div>
							</div>
							<div class="row justify-content-end">
								<div class="col-6">
									<a :href="btnForget.url" class="btn btn-outline-light btn-block text-dark" role="button">
										{{ btnForget.title }}
									</a>
								</div>
							</div>
						</form>
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
</template>

<script>
	export default {
		name : 'login',
		data: () => ({
			email     : null,
			password  : null,
			title     : 'Inicio', 	 
			btnLogin  : {
				url   : 'login',
				title : 'Inicio'
			},
			btnForget : {
				url   : 'forget',
				title : 'Olvide la clave'
			}
		}),
		methods: {
			//
		}
	};
</script>