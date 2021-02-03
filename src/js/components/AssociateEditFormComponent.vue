<template>
    <CRow class="justify-content-center">
      	<CCol class="col-4">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
					<i class="fa fa-user-friends"></i> Editar Asociado
				</CCardHeader>
	          	<CCardBody :id="id">
	            	<CForm>
						<CRow>
							<CCol>
								<CInput
								    id="first_name"
					                label="Nombres"
					                placeholder="Nombres"
					                class="text-right"
					                v-model="associate.first_name"
					                horizontal
					                required
					                autocomplete="off"
					            />
					        </CCol>
					    </CRow>
					    <CRow>
					        <CCol>
								<CInput
								    id="last_name"
					                label="Apellidos"
					                placeholder="Apellidos"
					                class="text-right"
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
								    id="email"
					                label="Correo"
					                type="email"
					                placeholder="Correo electrónico"
					                class="text-right"
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
					                class="text-right"
					                v-model="associate.phone"
					                horizontal
					                required
					                autocomplete="off"
					            />
					        </CCol>
					    </CRow>
					    <CRow>
					        <CCol>
								<CRow class="form-group">
									<label class="col-md-3 col-form-label text-right" for="state">Estado</label>
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
					    <CRow>
					        <CCol>
					        	<CInput
								    id="created_at"
					                label="Creado"
					                class="text-right"
					                v-model="associate.created_at"
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
					                v-model="associate.updated_at"
					                horizontal
					                disabled
					            />
					        </CCol>
					    </CRow>
						<CRow><CCol><hr></CCol></CRow>
						<CRow>
							<CCol>
								<CLink class="btn btn-block btn-secondary" href="../../asociados">
									<i class="far fa-times-circle"></i> Cancelar
								</CLink>
					        </CCol>
					        <CCol>
					        	<CButton class="btn btn-block btn-primary" @click="editAssociate(associate.id)">
						            <i class="far fa-check-circle"></i> Editar
						        </CButton>
					        </CCol>
						</CRow>
					</CForm>
				</CCardBody>
			</CCard>
		</CCol>
	</CRow>
</template>

<script>
	export default {
		name : 'associate-edit-form',
		props: {
			id : {type: Number, required: true}
		},
		created () {
			this.getAssociateById( this.id )
		},
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			associate : []
		}),
		methods: {
			getAssociateById ( id ) {
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
				    		this.associate = result.data

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
		    editAssociate ( id ) {

		    	const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        body: JSON.stringify(this.associate),
			        cache: 'no-cache'
			    }

				fetch('../update/'+ id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
					        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.associate = result.data

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