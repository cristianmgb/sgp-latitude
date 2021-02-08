<template>
	<div>
	    <CRow>
	      	<CCol class="col-3">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fas fa-plus-circle fa-lg"></i> Nuevo Contratista
		          	</CCardHeader>
		          	<CCardBody>
		            	<ValidationObserver ref="form">
	            			<CForm @submit.prevent="onSubmit">
	            				<CRow>
									<CCol>
					            		<SgpInputInline
					            			id="name"
					            			label="Nombre"
					            			type="text"
					            			placeholder="Nombre"
					            			rules="required|alpha_spaces"
					            			v-model="contractor.name"
					            		/>
					            	</CCol>
					            </CRow>
					            <CRow>
					            	<CCol>
					            		<SgpTextAreaInline
					            			id="description"
						                    label="Descripción"
						                    rows="8"
						                    rules="required|min:50"
						                    v-model="contractor.description"
							            	placeholder="Descripción del contratista"
					            		/>
									</CCol>
			            		</CRow>
								<CRow>
									<CCol>
										<label class="col-form-label" for="state">Estado</label>
										<ValidationProvider name="Estado" rules="required" v-slot="{ errors }">
											<select
												id="state"
												name="Estado"
												class="form-control"
												v-model="contractor.state"
												:class="{ 'is-invalid': errors[0] }"
											>
												<option v-for="option in options" :value="option.value">
									             	{{ option.text }}
									            </option>
											</select>
											<AlertError :errors="errors[0]"></AlertError>
										</ValidationProvider>
							        </CCol>
							    </CRow>
							    <CRow><CCol><hr></CCol></CRow>
								<CRow>
							        <CCol>
							        	<CButton type="submit" class="btn btn-block btn-primary">
								            <i class="fas fa-save"></i> Guardar
								        </CButton>
							        </CCol>
								</CRow>
							</CForm>
						</ValidationObserver>
		          	</CCardBody>
		        </CCard>
	      	</CCol>
	      	<CCol class="col-9">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fa fa-align-justify"></i> Contratistas
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
								<tr v-for="contractor in contractors">
						    		<td class="text-center">{{ contractor.name }}</td>
						    		<td>{{ contractor.description }}</td>
						    		<td class="text-center">
						    			<CBadge color="secondary">
							          		{{ contractor.created_at }}
							          	</CBadge>
						    		</td>
						    		<td class="text-center">
						    			<CBadge color="warning" v-if="contractor.updated_at">
						    				{{ contractor.updated_at }}
						    			</CBadge>
						    		</td>
							        <td class="text-center">
							          	<CBadge :color="getStateBadge(contractor.state)">
							          		{{ getValueState(contractor.state) }}
							          	</CBadge>
							        </td>
						    		<td class="text-center">
						    			<CButtonGroup class="btn-group btn-group-sm">
						    				<CLink class="btn btn-outline-info" :href="`contratista/edit/${contractor.id}`">
										        <i class="far fa-edit"></i>
										    </CLink>
									      	<CButton
									      		variant="outline" color="danger"
									      		@click="getId(contractor.id)"
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
					        	<CButton color="danger" class="btn-block" @click="deleteContractor()">
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
	import SgpInputInline from './SgpInputInline'
	import SgpTextAreaInline from './SgpTextAreaInline'
	import AlertError from './AlertError'

	export default {
		name : 'contractor-form',
		components: { SgpInputInline, SgpTextAreaInline, AlertError },
		data () {
    		return {
    			contractor: {
			        name 		: '',
    				description : '',
    				state 		: ''
			    },
				options : [
					{ value: '' , text: 'Seleccionar' },
					{ value: '1', text: 'Activo' },
					{ value: '0', text: 'Inactivo' }
				],
				contractors: [],
				id : ''
			}
	  	},
		created () {
			this.getContractors()
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
		    getContractors () {
		    	fetch('contratista/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.contractors = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.contractor = {
			        name 	   : '',
    				description: '',
    				state 	   : ''
			    }
		    },
		    onSubmit() {
				this.$refs.form.validate().then(success => {
					if (!success) {
			          	return;
			        }

			    	const config = {
				        method: 'POST',
				        headers: {
				        	'Content-Type': 'application/json',
				        	'X-Requested-With': 'XMLHttpRequest'
				        },
				        body: JSON.stringify(this.contractor),
				        cache: 'no-cache'
				    }

			    	fetch('contratista/create', config)
					    .then( response => response.json() )
					    .then( result   => {

					    	if ( result.statusCode === 200 ) {
						        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
						        this.getContractors()
					    		this.resetForm()

						        this.$nextTick(() => {
						          	this.$refs.form.reset();
						        });
					    	}

					    	if ( result.statusCode === 500 ) {
								this.$toast.info('<i class="fas fa-info-circle"></i> ' + result.message)
								return ;
					    	}
					    }).catch(function(err) {
					        console.error(err)
					    });
				});
			},
			deleteContractor() {
				const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        cache: 'no-cache'
			    }

				fetch('contratista/delete/'+ this.id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
				    		$('#deleteModal').modal('hide')
				    		this.getContractors()
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