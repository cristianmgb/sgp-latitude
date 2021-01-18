<template>
	<div class="row">
		<div class="col">
			<div class="card card-accent-primary">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Usuarios
				</div>
				<div class="card-body p-0">
					<table class="table table-responsive-sm table-striped table-sm">
						<thead>
							<tr class="text-center">
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Rol</th>
								<th>Teléfono</th>
								<th>Creado</th>
								<th>Modificado</th>
								<th width="100px">Estado</th>
								<th width="100px">Acción</th>
							</tr>
						</thead>
						<tbody id="users"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name : 'user-table',
		data: () => ({
			
		}),
		methods: {
			//
		}
	};
</script>