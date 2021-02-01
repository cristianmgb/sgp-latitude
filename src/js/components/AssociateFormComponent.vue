<template>
	<div>
	    <CRow class="justify-content-center">
	      	<CCol class="col-8">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
						<i class="fa fa-user-friends"></i> Nuevo Asociado
					</CCardHeader>
		          	<CCardBody class="pb-0">
		            	<CForm>
							<CRow>
								<CCol>
									<CInput
									    id="first_name"
						                label="Nombres"
						                placeholder="Nombres"
						                v-model="associate.first_name"
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
						                v-model="associate.last_name"
						                horizontal
						                required
						                autocomplete="off"
						            />
						        </CCol>
							</CRow>
							<CRow>
								<CCol>
									<CInput
									    id="identificacion"
						                label="Identificación"
						                placeholder="Identificación"
						                v-model="associate.identificacion"
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
						                placeholder="Correo electrónico"
						                v-model="associate.email"
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
						                placeholder="Teléfono"
						                v-model="associate.phone"
						                horizontal
						                required
						                autocomplete="off"
						            />
						        </CCol>
						        <CCol>
									<CRow class="form-group">
										<label class="col-md-3 col-form-label" for="state">Estado</label>
										<div class="col-md-9">
											<select class="form-control" id="state" name="state" v-model="associate.state">
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
								        	<CButton class="btn btn-block btn-primary" @click="addAssociate">
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
		name : 'associate-form',
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			associate : {
		        first_name     : '',
		        last_name      : '',
				identification : '',
				email          : '',
				phone          : '',
				state 	       : ''
		    }
		}),
		methods: {
			resetForm () {
		    	return this.associate = {
			        first_name     : '',
			        last_name      : '',
					identification : '',
					email          : '',
					phone          : '',
					state 	       : ''
			    }
		    },
		    addAssociate () {

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