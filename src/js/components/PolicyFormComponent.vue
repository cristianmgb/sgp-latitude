<template>
    <CRow class="justify-content-center">
      	<CCol class="col-4">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
	            	<i class="fas fa-plus-circle fa-lg"></i> Nueva Póliza
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
				            			v-model="policy.name"
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
					                    v-model="policy.description"
						            	placeholder="Descripción de la póliza"
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
						    <CRow><CCol><hr></CCol></CRow>
							<CRow>
								<CCol>
									<CLink class="btn btn-block btn-outline-danger" href="../policies">
										<i class="fas fa-undo-alt"></i> Regresar
									</CLink>
						        </CCol>
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
    </CRow>
</template>

<script>
	import SgpInputInline from './SgpInputInline'
	import SgpTextAreaInline from './SgpTextAreaInline'
	import AlertError from './AlertError'

	export default {
		name : 'policy-form',
		components: { SgpInputInline, SgpTextAreaInline, AlertError },
		data () {
    		return {
    			policy: {
			        name 		: '',
    				description : '',
    				state 		: ''
			    },
				options : [
					{ value: '' , text: 'Seleccionar' },
					{ value: '1', text: 'Activo' },
					{ value: '0', text: 'Inactivo' }
				]
			}
	  	},
		methods: {
		    resetForm () {
		    	return this.policy = {
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
				        body: JSON.stringify(this.policy),
				        cache: 'no-cache'
				    }

				    console.log(this.policy)

			    	fetch('./create', config)
					    .then( response => response.json() )
					    .then( result   => {

					    	if ( result.statusCode === 200 ) {
						        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
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
			}
		}
	};
</script>