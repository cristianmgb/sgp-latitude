<template>
    <CRow class="justify-content-center">
      	<CCol class="col-4">
	        <CCard class="card-accent-primary">
	          	<CCardHeader>
					<i class="fa fa-user-friends"></i> Editar Contratista
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
					                v-model="contractor.name"
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
					        		v-model="contractor.description"
					        		label="Descripción"
					        		placeholder="Descripción del contratista"
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
										<select class="form-control" id="state" name="state" v-model="contractor.state">
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
					                v-model="contractor.created_at"
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
					                v-model="contractor.updated_at"
					                horizontal
					                disabled
					            />
					        </CCol>
					    </CRow>
						<CRow><CCol><hr></CCol></CRow>
						<CRow>
							<CCol>
								<CLink class="btn btn-block btn-secondary" href="../../contratistas">
									<i class="far fa-times-circle"></i> Cancelar
								</CLink>
					        </CCol>
					        <CCol>
					        	<CButton class="btn btn-block btn-primary" @click="editContractor(contractor.id)">
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
		name : 'contractor-edit-form',
		props: {
			id : {type: Number, required: true}
		},
		created () {
			this.getContractorById( this.id )
		},
		data: () => ({
			options : [
				{ value: '' , text: 'Seleccionar' },
				{ value: '1', text: 'Activo' },
				{ value: '0', text: 'Inactivo' }
			],
			contractor : []
		}),
		methods: {
			getContractorById ( id ) {
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
				    		this.contractor = result.data

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
		    editContractor ( id ) {

		    	const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        body: JSON.stringify(this.contractor),
			        cache: 'no-cache'
			    }

				fetch('../update/'+ id, config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
					        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.contractor = result.data

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