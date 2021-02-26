<template>
	<div>
	    <CRow class="justify-content-center">
	      	<CCol class="col-8">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario
		          	</CCardHeader>
		          	<CCardBody>
		          		<ValidationObserver ref="form">
			            	<CForm @submit.prevent="onSubmit">
			            		<CRow>
									<CCol>
					            		<SgpInput
					            			id="first_name"
					            			name="Nombres"
					            			label="Nombres"
					            			type="text"
					            			placeholder="Nombres"
					            			rules="required|alpha_spaces"
					            			v-model="user.first_name"
					            		/>
					            	</CCol>
					            	<CCol>
					            		<SgpInput
					            			id="last_name"
					            			name="Apellidos"
					            			label="Apellidos"
					            			type="text"
					            			placeholder="Apellidos"
					            			rules="required|alpha_spaces"
					            			v-model="user.last_name"
					            		/>
									</CCol>
					            </CRow>
					            <CRow>
									<CCol>
					            		<SgpInput
					            			id="phone"
					            			name="Teléfono"
					            			label="Teléfono"
					            			type="text"
					            			placeholder="Teléfono"
					            			rules="required|numeric|min:10|max:10"
					            			v-model="user.phone"
					            		/>
					            	</CCol>
					            	<CCol>
					            		<SgpInput
					            			id="email"
					            			name="Correo"
					            			label="Correo"
					            			type="email"
					            			placeholder="user@test.com"
					            			rules="required|email"
					            			v-model="user.email"
					            		/>
									</CCol>
					            </CRow>
					            <CRow>
									<CCol>
										<CRow class="form-group">
											<CCol sm="3">
												<label class="col-form-label" for="password">Contraseña</label>
											</CCol>
											<CCol sm="9">
								            	<ValidationProvider name="Contraseña" rules="required|min:10" vid="confirm" v-slot="{ errors }">
												    <input
												    	id="password"
												    	name="Contraseña"
												    	type="password"
												    	v-model="password"
												    	placeholder="Contraseña"
												    	class="form-control"
												    	:class="{ 'is-invalid': errors[0] }"
												    >
												    <AlertError :errors="errors[0]"></AlertError>
												</ValidationProvider>
											</CCol>
										</CRow>
					            	</CCol>
					            	<CCol>
					            		<SgpInput
					            			id="confirm"
									    	name="Confirmar"
										    type="password"
									    	label="Confirmar"
										    v-model="confirm"
									    	placeholder="Confirmar"
									    	rules="required|min:10|confirmed:confirm"
					            		/>
									</CCol>
					            </CRow>
					            <CRow>
					            	<CCol>
					            		<CRow class="form-group">
											<CCol sm="3">
												<label class="col-form-label" for="id_rol">Rol</label>
											</CCol>
											<CCol sm="9">
												<ValidationProvider name="Rol" rules="required" v-slot="{ errors }">
													<select
														id="id_rol"
														name="Rol"
														class="form-control"
														v-model="user.id_rol"
														:class="{ 'is-invalid': errors[0] }"
													>
														<option value="">Seleccionar</option>
														<option v-for="rol in roles" :value="rol.value">
											             	{{ rol.text }}
											            </option>
													</select>
													<AlertError :errors="errors[0]"></AlertError>
												</ValidationProvider>
									        </CCol>
									    </CRow>
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
														v-model="user.state"
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
										<CButton class="btn btn-block btn-secondary">
											<i class="far fa-times-circle"></i> Cancelar
										</CButton>
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
	</div>
</template>

<script>
	import SgpInput from './SgpInput'
	import AlertError from './AlertError'

	export default {
		name : 'user-form',
		components: { SgpInput, AlertError },
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			roles : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Superadministrador' },
				{ value: '2', text: 'Administrador' },
				{ value: '3', text: 'Asociado' }
			],
			user: {
		        first_name : '',
		        last_name  : '',
				phone      : '',
				email      : '',
				password   : '',
				id_rol     : '',
				state 	   : ''
		    },
			// roles: [],
			password : '',
		    confirm  : ''
		}),
		created () {
			this.getRoles()
		},
		methods: {
			getRoles () {
		    	fetch('../rol/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		// this.roles = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.user = {
			       	first_name : '',
			        last_name  : '',
					phone      : '',
					email      : '',
					password   : '',
					id_rol     : '',
					state 	   : ''
			    }
		    },
		    onSubmit() {
				this.$refs.form.validate().then(success => {
					if (!success) {
			          	return;
			        }

			        this.user.password = this.confirm

			        if (this.user.password) {
				        const config = {
					        method: 'POST',
					        headers: {
					        	'Content-Type': 'application/json',
					        	'X-Requested-With': 'XMLHttpRequest'
					        },
					        body: JSON.stringify(this.user),
					        cache: 'no-cache'
					    }

						fetch('./create', config)
						    .then( response => response.json() )
						    .then( result   => {

						    	if ( result.statusCode === 200 ) {
							        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
							        this.password = ''
		   							this.confirm  = ''
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
			        }
				});
		    },
		}
	};
</script>