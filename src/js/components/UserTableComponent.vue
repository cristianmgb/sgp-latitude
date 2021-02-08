<template>
	<div>
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
									<th width="100px">Acción</th>
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
							        <td class="text-center">
						    			<CButtonGroup class="btn-group btn-group-sm">
						    				<CLink class="btn btn-outline-info" :href="`usuario/edit/${user.userId}`">
										        <i class="far fa-edit"></i>
										    </CLink>
									      	<CButton
									      		variant="outline" color="danger"
									      		@click="getId(user.userId)"
									      		data-toggle="modal" data-target="#deleteModal"
									      	>
									      		<i class="far fa-trash-alt"></i>
									      	</CButton>
									    </CButtonGroup>
						    		</td>
						    	</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade modal-danger" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteTitle" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      	<div class="modal-header">
				        <h5 class="modal-title" id="deleteTitle">
				        	<i class="far fa-trash-alt"></i> Eliminar
				        </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			      	<div class="modal-body text-center">
		      			<CRow>
							<CCol>
								<h4>¿ Está seguro de eliminar este Usuario ?</h4>
							</CCol>
						</CRow>
						<hr>
			        	<CRow>
							<CCol>
					        	<CButton color="secondary" class="btn-block" data-dismiss="modal">
						            <i class="far fa-times-circle"></i> Cancelar
						        </CButton>
					        </CCol>
					        <CCol>
					        	<CButton color="danger" class="btn-block" @click="deleteUser()">
						            <i class="far fa-check-circle"></i> Eliminar
						        </CButton>
					        </CCol>
					    </CRow>
			      	</div>
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
    			id : '',
				users: []
			}
	  	},
		created () {
			this.getUsers()
		},
		methods: {
			getId ( val ) {
    			return this.id = val
    		},
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
		    },
		    deleteUser() {
				const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        cache: 'no-cache'
			    }

				fetch('usuario/delete/'+ this.id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
				    		$('#deleteModal').modal('hide')
				    		this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.id = ''
				    		this.getUsers()

					        return ;
				    	}

				    	if ( result.statusCode === 500 ) {
							this.$toast.info('<i class="fas fa-info-circle"></i> ' + result.message)
							return ;
				    	}
				    }).catch(function(err) {
				        console.error(err)
				    });
			}
		}
	};
</script>