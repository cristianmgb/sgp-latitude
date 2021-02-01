<template>
	<div>
	    <CRow class="justify-content-center">
	      	<CCol class="col-8">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario
		          	</CCardHeader>
		          	<CCardBody class="pb-0">
		            	<CForm>
							<CRow>
								<CCol>
									<CInput
									    id="first_name"
						                label="Nombres"
						                placeholder="Nombres"
						                v-model="user.first_name"
						                horizontal
						                required
						                autocomplete="off"
						            />
								</CCol>
								<CCol>
									<CInput
									    id="last_name"
						                label="Apellidos"
						                placeholder="Apellidos"
						                v-model="user.last_name"
						                horizontal
						                required
						                autocomplete="off"
						            />
								</CCol>
							</CRow>
							<CRow>
								<CCol>
									<CInput
									    id="phone"
						                label="Teléfono"
						                placeholder="000-0000000"
						                v-model="user.phone"
						                horizontal
						                required
						                autocomplete="off"
						            />
								</CCol>
								<CCol>
									<CInput
									    id="email"
						                label="Correo"
						                type="email"
						                placeholder="user@correo.com"
						                v-model="user.email"
						                horizontal
						                required
						                autocomplete="off"
						            />
								</CCol>
							</CRow>
							<CRow>
								<CCol>
									<CInput
									    id="password"
						                label="Contraseña"
						                type="password"
						                placeholder="******"
						                v-model="password"
						                horizontal
						                required
						                autocomplete="off"
						            />
								</CCol>
								<CCol>
									<CInput
									    id="confirm_password"
						                label="Confirmar"
						                type="password"
						                placeholder="******"
						                v-model="confirm"
						                horizontal
						                required
						                autocomplete="off"
						            />
								</CCol>
							</CRow>
							<CRow>
								<CCol>
									<CRow class="form-group">
										<label class="col-md-3 col-form-label" for="id_rol">Rol</label>
										<div class="col-md-9">
											<select class="form-control" id="id_rol" name="id_rol" v-model="user.id_rol">
												<option value="">Seleccionar</option>
												<option v-for="rol in roles" :value="rol.id" :key="rol.id">
									             	{{ rol.name }}
									            </option>
											</select>
										</div>
									</CRow>
								</CCol>
								<CCol>
									<CRow class="form-group">
										<label class="col-md-3 col-form-label" for="state">Estado</label>
										<div class="col-md-9">
											<select class="form-control" id="state" name="state" v-model="user.state">
												<option v-for="option in options" :value="option.value" :key="option.value">
									             	{{ option.text }}
									            </option>
											</select>
										</div>
									</CRow>
								</CCol>
							</CRow>
							<CRow><CCol><hr></CCol></CRow>
							<CRow class="justify-content-center">
								<CCol class="col-8">
									<CRow class="form-group">
										<CCol>
											<CButton class="btn btn-block btn-secondary">
												<i class="far fa-times-circle"></i> Cancelar
											</CButton>
								        </CCol>
								        <CCol>
								        	<CButton class="btn btn-block btn-primary" @click="addUser">
									            <i class="far fa-check-circle"></i> Guardar
									        </CButton>
								        </CCol>
									</CRow>
								</CCol>
							</CRow>
						</CForm>
					</CCardBody>
				</CCard>
			</CCol>
		</CRow>
	</div>
</template>

<script>
	export default {
		name : 'user-form',
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			user: {
		        first_name : '',
		        last_name  : '',
				id_rol     : '',
				email      : '',
				password   : '',
				phone      : '',
				state 	   : ''
		    },
		    password : '',
		    confirm  : '',
			roles: []
		}),
		created () {
			this.getRoles()
		},
		methods: {
			getRoles () {
		    	fetch('../rol/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.roles = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.user = {
			        first_name : '',
			        last_name  : '',
					id_rol     : '',
					email      : '',
					password   : '',
					phone      : '',
					state 	   : ''
			    }
		    },
		    validatePassword ( password, confirm) {
 				return ( password === confirm ) ? this.user.password = confirm : this.$toast.error('<i class="fas fa-exclamation-circle"></i> Las contraseñas no coinciden')
		    },
		    addUser () {

			    if ( this.validatePassword( this.password, this.confirm ) ) {

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
					    		this.resetForm()
					    		this.password = ''
		    					this.confirm  = ''

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
		}
	};
</script>