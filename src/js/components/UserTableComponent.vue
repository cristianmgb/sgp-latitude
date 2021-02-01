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
								<th>Correo</th>
								<th>Creado</th>
								<th>Modificado</th>
								<th width="100px">Estado</th>
								<!-- <th width="100px">Acción</th> -->
							</tr>
						</thead>
						<tbody class="pb-0">
							<tr v-for="user in users">
					    		<td class="text-center">{{ user.first }}</td>
					    		<td class="text-center">{{ user.last }}</td>
					    		<td class="text-center">
					    			<CBadge color="info">{{ user.rolName }}</CBadge>
					    		</td>
					    		<td class="text-center">{{ user.email }}</td>
					    		<td class="text-center">
					    			<CBadge color="secondary">{{ user.created }}</CBadge>
					    		</td>
					    		<td class="text-center">
					    			<CBadge color="warning" v-if="user.updated">{{ user.updated }}</CBadge>
					    		</td>
						        <td class="text-center">
						          	<CBadge :color="getStateBadge(user.userState)">{{ getValueState(user.userState) }}</CBadge>
						        </td>
					    	</tr>
							<tr v-if="users === 0"><td colspan="7" class="text-center">No hay registros disponibles</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name : 'user-table',
		data () {
    		return {
				users: []
			}
	  	},
		created () {
			this.getUsers()
		},
		methods: {
		    getStateBadge (state) {
				return ( state === '0') ? 'warning' : 'success'	
		    },
		    getValueState (state) {
		      	return ( state === '0') ? 'Inactivo' : 'Activo'	
		    },
		    getUsers () {
		    	fetch('usuario/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.users = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    }
		}
	};
</script>