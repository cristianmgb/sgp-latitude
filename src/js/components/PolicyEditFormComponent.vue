<template>
    <CRow class="justify-content-center">
      	<CCol class="col-4">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
					<i class="fa fa-user-friends"></i> Editar Póliza
				</CCardHeader>
	          	<CCardBody>
	            	<ValidationObserver ref="form">
		            	<CForm @submit.prevent="onSubmit">
							<CRow>
								<CCol>
									<SgpInput
				            			id="name"
				            			label="Nombre"
				            			type="text"
				            			placeholder="Nombre"
				            			rules="required|alpha_spaces"
				            			v-model="policy.name"
				            		/>
						        </CCol>
						    </CRow>
						    <CRow>
				            	<CCol>
				            		<SgpTextArea
				            			id="description"
					                    label="Descripción"
					                    rows="8"
					                    rules="required|min:50"
					                    v-model="policy.description"
						            	placeholder="Descripción de la póliza"
				            		/>
								</CCol>
		            		</CRow>
					    	<CRow>
						        <CCol>
				            		<CRow class="form-group">
										<CCol sm="3">
											<label class="col-form-label" for="state">Estado</label>
										</CCol>
										<CCol sm="9">
											<ValidationProvider name="Estado" rules="required" v-slot="{ errors }">
												<select
													id="state"
													name="Estado"
													class="form-control"
													v-model="policy.state"
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
						        </CCol>
						    </CRow>
						    <CRow>
						        <CCol>
						        	<CInput
									    id="created_at"
						                label="Creado"
						                class="text-right"
						                v-model="policy.created_at"
						                horizontal
						                disabled
						            />
						        </CCol>
						    </CRow>
						     <CRow>
						        <CCol>
						        	<CInput
									    id="updated_at"
						                label="Actualizado"
						                class="text-right"
						                v-model="policy.updated_at"
						                horizontal
						                disabled
						            />
						        </CCol>
						    </CRow>
							<CRow><CCol><hr></CCol></CRow>
							<CRow>
								<CCol>
									<CLink class="btn btn-block btn-outline-danger" href="../../polizas">
										<i class="fas fa-undo-alt"></i> Regresar
									</CLink>
						        </CCol>
						        <CCol>
						        	<CButton type="submit" class="btn btn-block btn-primary">
							            <i class="far fa-check-circle"></i> Editar
							        </CButton>
						        </CCol>
							</CRow>
						</CForm>
					</ValidationObserver>
				</CCardBody>
			</CCard>
		</CCol>
	</CRow>
</template>

<script>
	import SgpInput from './SgpInput'
	import SgpTextArea from './SgpTextArea'
	import AlertError from './AlertError'

	export default {
		name : 'policy-edit-form',
		components: { SgpInput, SgpTextArea, AlertError },
		props: {
			id : {
				type: Number,
				required: true
			}
		},
		created () {
			this.getPolicyById( this.id )
		},
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			policy : []
		}),
		methods: {
			getPolicyById ( id ) {
				const config = {
			        method: 'GET',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        cache: 'no-cache'
			    }

				fetch('../getById/'+ this.id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
				    		this.policy = result.data

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
				        body: JSON.stringify(this.policy),
				        cache: 'no-cache'
				    }

					fetch('../update/'+ this.id, config)
					    .then( response => response.json() )
					    .then( result   => {

					    	if ( result.statusCode === 200 ) {
						        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
					    		this.getPolicyById( this.id )
					    	}

					    	if ( result.statusCode === 500 ) {
								this.$toast.info('<i class="fas fa-info-circle"></i> ' + result.message)
					    	}
					    }).catch(function(err) {
					        console.error(err)
					    });
				});
		    }
		}
	};
</script>