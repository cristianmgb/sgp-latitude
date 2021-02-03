<template>
	<div>
	    <CRow>
	      	<CCol class="col-3">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fas fa-plus-circle fa-lg"></i> Nuevo Rol
		          	</CCardHeader>
		          	<CCardBody>
		            	<CForm>
							<CRow>
								<CCol>
									<CInput
										id="name"
										v-model="rol.name"
										label="Nombre"
										placeholder="Nombre del rol"
							            required
							            autocomplete="off"
									/>
								</CCol>
							</CRow>
							<CRow>
								<CCol>
									<CTextarea
										id="description"
										v-model="rol.description"
										label="Descripción"
										placeholder="Descripción del rol"
										rows="8"
							            required
							            autocomplete="off"
									/>
								</CCol>
							</CRow>
							<CCol>
								<CRow class="form-group">
									<label for="state">Estado</label>
									<select class="form-control" id="state" name="state" v-model="rol.state">
										<option v-for="option in options" :value="option.value" :key="option.value">
							             	{{ option.text }}
							            </option>
									</select>
								</CRow>
						    </CCol>
							<CRow><CCol><hr></CCol></CRow>
							<CRow>
								<CCol>
									<CButton class="btn btn-block btn-secondary">
										<i class="far fa-times-circle"></i> Cancelar
									</CButton>
						        </CCol>
						        <CCol>
						        	<CButton class="btn btn-block btn-primary" @click="addRol">
							            <i class="far fa-check-circle"></i> Guardar
							        </CButton>
						        </CCol>
							</CRow>
						</CForm>
		          	</CCardBody>
		        </CCard>
	      	</CCol>
	      	<CCol class="col-9">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fa fa-align-justify"></i> Roles
		          	</CCardHeader>
		          	<CCardBody class="p-0">
		          		<table class="table table-responsive-sm table-hover table-striped table-sm">
							<thead>
								<tr class="text-center">
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th width="100px">Estado</th>
									<th width="100px">Acción</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="rol in roles">
						    		<td class="text-center">{{ rol.name }}</td>
						    		<td>{{ rol.description }}</td>
						    		<td class="text-center">
						    			<CBadge color="secondary">
							          		{{ rol.created_at }}
							          	</CBadge>
						    		</td>
						    		<td class="text-center">
						    			<CBadge color="warning" v-if="rol.updated_at">
						    				{{ rol.updated_at }}
						    			</CBadge>
						    		</td>
							        <td class="text-center">
							          	<CBadge :color="getStateBadge(rol.state)">
							          		{{ getValueState(rol.state) }}
							          	</CBadge>
							        </td>
						    		<td class="text-center">
						    			<CButtonGroup class="btn-group btn-group-sm">
						    				<CLink class="btn btn-outline-info" :href="`rol/edit/${rol.id}`">
										        <i class="far fa-edit"></i>
										    </CLink>
									      	<CButton
									      		variant="outline" color="danger"
									      		@click="getId(rol.id)"
									      		data-toggle="modal" data-target="#deleteModal"
									      	>
									      		<i class="far fa-trash-alt"></i>
									      	</CButton>
									    </CButtonGroup>
						    		</td>
						    	</tr>
							</tbody>
						</table>
		          	</CCardBody>
		        </CCard>
	      	</CCol>
	    </CRow>

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
								<h4>¿ Está seguro de eliminar este registro ?</h4>
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
					        	<CButton color="danger" class="btn-block" @click="deleteRol()">
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
		name : 'rol-form',
		data () {
    		return {
    			rol: {
			        name 		: '',
    				description : '',
    				state 		: ''
			    },
				options : [
					{ value: '' , text: 'Seleccionar' },
					{ value: '1', text: 'Activo' },
					{ value: '0', text: 'Inactivo' }
				],
				id: '',
				roles: []
			}
	  	},
		created () {
			this.getRoles()
		},
		methods: {
			getId ( val ) {
    			return this.id = val
    		},
		    getStateBadge (state) {
				return ( state === '0') ? 'secondary' : 'success'	
		    },
		    getValueState (state) {
		      	return ( state === '0') ? 'Inactivo' : 'Activo'	
		    },
		    getRoles () {
		    	fetch('rol/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.roles = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.rol = {
			        name 	   : '',
    				description: '',
    				state 	   : ''
			    }
		    },
		    addRol () {
		    	const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        body: JSON.stringify(this.rol),
			        cache: 'no-cache'
			    }

		    	fetch('rol/create', config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
					        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.resetForm()
					        this.getRoles()

					        return ;
				    	}

				    	if ( result.statusCode === 500 ) {
							this.$toast.info('<i class="fas fa-info-circle"></i> ' + result.message)
							return ;
				    	}
				    }).catch(function(err) {
				        console.error(err)
				    });
			},
		    deleteRol() {
				const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        cache: 'no-cache'
			    }

				fetch('rol/delete/'+ this.id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
				    		$('#deleteModal').modal('hide')
				    		this.getRoles()
				    		this.id = ''
				    		this.$toast.success('<i class="fas fa-check"></i> ' + result.message)

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