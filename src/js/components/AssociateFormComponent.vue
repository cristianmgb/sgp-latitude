<template>
    <CRow class="justify-content-center">
      	<CCol class="col-7">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
					<i class="fa fa-user-friends"></i> Nuevo Asociado
				</CCardHeader>
	          	<CCardBody>
	          		<ValidationObserver ref="form">
		            	<CForm @submit.prevent="onSubmit">
		            		<CRow>
								<CCol>
				            		<SgpInput
				            			id="first_name"
				            			label="Nombres"
				            			type="text"
				            			placeholder="Nombres"
				            			rules="required|alpha_spaces"
				            			v-model="associate.first_name"
				            		/>
				            	</CCol>
				            	<CCol>
				            		<SgpInput
				            			id="last_name"
				            			label="Apellidos"
				            			type="text"
				            			placeholder="Apellidos"
				            			rules="required|alpha_spaces"
				            			v-model="associate.last_name"
				            		/>
								</CCol>
				            </CRow>
				            <CRow>
								<CCol>
				            		<SgpInput
				            			id="identification"
				            			label="Identificación"
				            			type="text"
				            			placeholder="Identificación"
				            			rules="required|numeric"
				            			v-model="associate.identification"
				            		/>
				            	</CCol>
				            	<CCol>
				            		<SgpInput
				            			id="email"
				            			label="Correo"
				            			type="email"
				            			placeholder="Correo"
				            			rules="required|email"
				            			v-model="associate.email"
				            		/>
								</CCol>
				            </CRow>
				            <CRow>
								<CCol>
				            		<SgpInput
				            			id="phone"
				            			label="Teléfono"
				            			type="text"
				            			placeholder="Teléfono"
				            			rules="required|numeric|min:10|max:10"
				            			v-model="associate.phone"
				            		/>
				            	</CCol>
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
													v-model="associate.state"
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
							<CRow><CCol><hr></CCol></CRow>
							<CRow>
								<CCol>
									<CLink class="btn btn-block btn-outline-danger" href="../associates">
										<i class="fas fa-undo-alt"></i> Regresar
									</CLink>
						        </CCol>
						        <CCol>
						        	<CButton type="submit" class="btn btn-block btn-primary">
							            <i class="far fa-check-circle"></i> Guardar
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
	import AlertError from './AlertError'

	export default {
		name : 'associate-form',
		components: { SgpInput, AlertError },
		data() {
      		return {
				options : [
					{ value: '' , text: 'Seleccionar' },
					{ value: '1', text: 'Activo' },
					{ value: '0', text: 'Inactivo' }
				],
				associate: {
					first_name     : '',
			        last_name      : '',
					identification : '',
					email          : '',
					phone          : '',
					state 	       : ''
				}
			}
		},
		methods: {
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
				        body: JSON.stringify(this.associate),
				        cache: 'no-cache'
				    }

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
		    },
			resetForm () {
		    	return this.associate = {
			        first_name     : '',
			        last_name      : '',
					identification : '',
					email          : '',
					phone          : '',
					state 	       : ''
			    }
		    }
		}
	};
</script>