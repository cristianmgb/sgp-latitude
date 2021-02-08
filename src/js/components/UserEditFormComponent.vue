<template>
    <CRow class="justify-content-center">
      	<CCol class="col-4">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
					<i class="fa fa-user-friends"></i> Editar Usuario
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
				            			v-model="user.first_name"
				            		/>
						        </CCol>
						    </CRow>
						    <CRow>
						        <CCol>
									<SgpInput
				            			id="last_name"
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
				            			id="email"
				            			label="Correo"
				            			type="email"
				            			placeholder="Correo"
				            			rules="required|email"
				            			v-model="user.email"
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
				            			v-model="user.phone"
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
													<option v-for="rol in roles" :value="rol.id">
										             	{{ rol.name }}
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
						    <CRow>
						        <CCol>
						        	<CInput
									    id="created_at"
						                label="Creado"
						                class="text-right"
						                v-model="user.created_at"
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
						                v-model="user.updated_at"
						                horizontal
						                disabled
						            />
						        </CCol>
						    </CRow>
							<CRow><CCol><hr></CCol></CRow>
							<CRow>
								<CCol>
									<CLink class="btn btn-block btn-outline-danger" href="../../usuarios">
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
	import AlertError from './AlertError'

	export default {
		name : 'user-edit-form',
		components: { SgpInput, AlertError },
		props: {
			id : {
				type: Number,
				required: true
			}
		},
		created () {
			this.getRoles()
			this.getUserById( this.id )
		},
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			user : [],
			roles: []
		}),
		methods: {
			getRoles () {
		    	fetch('../../rol/getAll')
				  	.then( response => response.json() )
				  	.then( result   => {
				  		this.roles = result.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
			getUserById ( id ) {
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
				    		this.user = result.data

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
				        body: JSON.stringify(this.user),
				        cache: 'no-cache'
				    }

					fetch('../update/'+ this.id, config)
					    .then( response => response.json() )
					    .then( result   => {

					    	if ( result.statusCode === 200 ) {
						        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
					    		this.getUserById( this.id )
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