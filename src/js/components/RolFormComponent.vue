<template>
	<div>
	    <CRow>
	      	<CCol class="col-3">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fas fa-plus-circle fa-lg"></i> Nuevo Rol
		          	</CCardHeader>
		          	<CCardBody>
		            	<CForm accept-charset="UTF-8" id="formRol">
							<div class="form-group">
								<CInput id="name" v-model="rol.name" label="Nombre" placeholder="Nombre del rol"/>
							</div>
							<div class="form-group">
								<CTextarea id="description" v-model="rol.description" label="Descripción" placeholder="Descripción del rol" rows="8"/>
							</div>
							<div class="form-group">
								<label for="state">Estado</label>
								<select class="form-control" id="state" name="state" v-model="rol.state">
									<option v-for="option in options" :value="option.value" :key="option.value">
						             	{{ option.text }}
						            </option>
								</select>
							</div>
							<div class="form-group">
								<hr>
					      		<div class="row">
									<div class="col">
							        	<CButton class="btn btn-block btn-secondary">
								            <i class="far fa-times-circle"></i> Cancelar
								        </CButton>
							        </div>
							        <div class="col">
							        	<CButton class="btn btn-block btn-primary" @click="addRol">
								            <i class="far fa-check-circle"></i> Guardar
								        </CButton>
							        </div>
							    </div>
							</div>
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
									<!-- <th width="100px">Acción</th> -->
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
						    		<!-- <td class="text-center">
						    			<CButtonGroup class="btn-group btn-group-sm">
									      	<CButton variant="outline" color="info" data-toggle="modal" :data-target="`#editRolModal${rol.id}`" @on="setId( rol.id )">
									      		<i class="far fa-edit"></i>
									      	</CButton>
									      	<CButton variant="outline" color="danger" data-toggle="modal" data-target="#deleteRolModal">
									      		<i class="far fa-trash-alt"></i>
									      	</CButton>
									    </CButtonGroup>
						    		</td> -->
						    	</tr>
							</tbody>
						</table>
		          	</CCardBody>
		        </CCard>
	      	</CCol>
	    </CRow>

	    <div class="modal fade modal-info" :id="`#editRolModal${this.id}`" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editRolTitle" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      	<div class="modal-header">
				        <h5 class="modal-title" id="editRolTitle">
				        	<i class="far fa-edit"></i> Editar Rol
				        </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			      	<div class="modal-body pb-0">
					    <CRow>
		      				<CCol>
				      			<CForm accept-charset="UTF-8" id="formRol">
									<div class="form-group">
										<CInput id="name" v-model="rol.name" label="Nombre" placeholder="Nombre del rol"/>
									</div>
									<div class="form-group">
										<CTextarea id="description" v-model="rol.description" label="Descripción" placeholder="Descripción del rol" rows="8"/>
									</div>
									<div class="form-group">
										<label for="state">Estado</label>
										<select class="form-control" id="state" name="state" v-model="rol.state">
											<option v-for="option in options" :value="option.value" :key="option.value">
								             	{{ option.text }}
								            </option>
										</select>
									</div>
									<div class="form-group">
										<hr>
							      		<CRow>
		      								<CCol>
									        	<CButton color="secondary" class="btn-block">
										            <i class="far fa-times-circle"></i> Cancelar
										        </CButton>
									        </CCol>
									        <CCol>
									        	<CButton color="info" class="btn-block">
										            <i class="far fa-check-circle"></i> Editar
										        </CButton>
									        </CCol>
									    </CRow>
									</div>
								</CForm>
		      				</CCol>
			      		</CRow>
			      	</div>
			    </div>
		  	</div>
		</div>

	    <div class="modal fade modal-danger" id="deleteRolModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteRolTitle" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      	<div class="modal-header">
				        <h5 class="modal-title" id="deleteRolTitle">
				        	<i class="far fa-trash-alt"></i> Eliminar Rol
				        </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			      	<div class="modal-body pb-0">
			      		<div class="form-group">
			      			<CRow class="justify-content-center">
								<CCol md="10">
									<h4>¿ Está segurto de eliminar este Rol ?</h4>
								</CCol>
							</CRow>
			      		</div>
			      		<div class="form-group">
							<hr>
				        	<CRow>
								<CCol>
						        	<CButton color="secondary" class="btn-block" data-dismiss="modal">
							            <i class="far fa-times-circle"></i> Cancelar
							        </CButton>
						        </CCol>
						        <CCol>
						        	<CButton color="danger" class="btn-block">
							            <i class="far fa-check-circle"></i> Editar
							        </CButton>
						        </CCol>
						    </CRow>
						</div>
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
		    setId(value) {
                this.id = value
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
		    deleteRol ( id ) {
		    	// fetch('rol/delete/' + id)
				   //  .then( response => response.json() )
				   //  .then( result   => {
				   //  	if ( result.statusCode === 200 ) {
					  //       this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
					  //       this.getRoles()

					  //       return ;
				   //  	}

				   //  	if ( result.statusCode === 500 ) {
							// this.$toast.info('<i class="fas fa-info-circle"></i> ' + result.message)
							// return ;
				   //  	}
				   //  }).catch(function(err) {
				   //      console.error(err)
				   //  });
			}
		}
	};
</script>