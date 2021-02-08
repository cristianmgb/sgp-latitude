<template>
	<div>
	    <CRow>
	      	<CCol class="col-3">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fas fa-plus-circle fa-lg"></i> Nuevo Impuesto
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
					            			v-model="tax.name"
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
						                    v-model="tax.description"
							            	placeholder="Descripción del impuesto"
					            		/>
									</CCol>
			            		</CRow>
			            		<CRow>
									<CCol>
					            		<SgpInputInline
					            			id="value"
					            			label="Valor %"
					            			type="text"
					            			placeholder="% del impuesto"
					            			rules="required|numeric"
					            			v-model="tax.value"
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
												v-model="tax.state"
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
		            	<i class="fa fa-align-justify"></i> Impuestos
		          	</CCardHeader>
		          	<CCardBody class="p-0">
		          		<table class="table table-responsive-sm table-hover table-striped table-sm">
							<thead>
								<tr class="text-center">
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Valor %</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th width="100px">Estado</th>
									<th width="100px">Acción</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="tax in taxes">
						    		<td class="text-center">{{ tax.name }}</td>
						    		<td>{{ tax.description }}</td>
						    		<td class="text-center">{{ tax.value }}</td>
						    		<td class="text-center">
						    			<CBadge color="secondary">
							          		{{ tax.created_at }}
							          	</CBadge>
						    		</td>
						    		<td class="text-center">
						    			<CBadge color="warning" v-if="tax.updated_at">
						    				{{ tax.updated_at }}
						    			</CBadge>
						    		</td>
							        <td class="text-center">
							          	<CBadge :color="getStateBadge(tax.state)">
							          		{{ getValueState(tax.state) }}
							          	</CBadge>
							        </td>
						    		<td class="text-center">
						    			<CButtonGroup class="btn-group btn-group-sm">
						    				<CLink class="btn btn-outline-info" :href="`impuesto/edit/${tax.id}`">
										        <i class="far fa-edit"></i>
										    </CLink>
									      	<CButton
									      		variant="outline" color="danger"
									      		@click="getId(tax.id)"
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
					        	<CButton color="danger" class="btn-block" @click="deleteTax()">
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
		name : 'tax-form',
		components: { SgpInputInline, SgpTextAreaInline, AlertError },
		data () {
    		return {
    			tax: {
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
				taxes: []
			}
	  	},
		created () {
			this.getTaxes()
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
		    getTaxes () {
		    	fetch('impuesto/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.taxes = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.tax = {
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
				        body: JSON.stringify(this.tax),
				        cache: 'no-cache'
				    }

			    	fetch('impuesto/create', config)
					    .then( response => response.json() )
					    .then( result   => {

					    	if ( result.statusCode === 200 ) {
						        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
						        this.getTaxes()
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
			deleteTax() {
				const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        cache: 'no-cache'
			    }

				fetch('impuesto/delete/'+ this.id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
				    		$('#deleteModal').modal('hide')
				    		this.getTaxes()
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