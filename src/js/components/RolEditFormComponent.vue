<template>
    <CRow class="justify-content-center">
      	<CCol class="col-4">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
					<i class="fa fa-user-friends"></i> Editar Rol
				</CCardHeader>
	          	<CCardBody :id="id">
	            	<CForm>
						<CRow>
							<CCol>
								<CInput
								    id="name"
					                label="Nombre"
					                placeholder="Nombre"
					                class="text-right"
					                v-model="rol.name"
					                horizontal
					                required
					                autocomplete="off"
					            />
					        </CCol>
					    </CRow>
					    <CRow>
					        <CCol>
					        	<CTextarea
					        		id="description"
					        		v-model="rol.description"
					        		label="Descripción"
					        		placeholder="Descripción del rol"
					        		rows="8"
					        		horizontal
					        		requiered
					        		autocomplete="off"
					        	/>
					        </CCol>
						</CRow>
					    <CRow>
					        <CCol>
								<CRow class="form-group">
									<label class="col-md-3 col-form-label text-right" for="state">Estado</label>
									<div class="col-md-9">
										<select class="form-control" id="state" name="state" v-model="rol.state">
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
					                v-model="rol.created_at"
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
					                v-model="rol.updated_at"
					                horizontal
					                disabled
					            />
					        </CCol>
					    </CRow>
						<CRow><CCol><hr></CCol></CRow>
						<CRow>
							<CCol>
								<CLink class="btn btn-block btn-secondary" href="../../roles">
									<i class="far fa-times-circle"></i> Cancelar
								</CLink>
					        </CCol>
					        <CCol>
					        	<CButton class="btn btn-block btn-primary" @click="editRol(rol.id)">
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
		name : 'rol-edit-form',
		props: {
			id : {type: Number, required: true}
		},
		created () {
			this.getRolById( this.id )
		},
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			rol : []
		}),
		methods: {
			getRolById ( id ) {
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
				    		this.rol = result.data

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
		    editRol ( id ) {

		    	const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        body: JSON.stringify(this.rol),
			        cache: 'no-cache'
			    }

				fetch('../update/'+ id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
					        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.rol = result.data

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