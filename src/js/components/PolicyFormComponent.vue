<template>
	<div>
	    <CRow>
	      	<CCol class="col-3">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fas fa-plus-circle fa-lg"></i> Nueva Póliza
		          	</CCardHeader>
		          	<CCardBody>
		            	<CForm accept-charset="UTF-8" id="formPolicy">
							<div class="form-group">
								<CInput id="name" v-model="policy.name" label="Nombre" placeholder="Nombre del impuesto" requiered/>
							</div>
							<div class="form-group">
								<CTextarea id="description" v-model="policy.description" label="Descripción" placeholder="Descripción del impuesto" rows="8" requiered/>
							</div>
							<div class="form-group">
								<label for="state">Estado</label>
								<select class="form-control" id="state" name="state" v-model="policy.state" requiered>
									<option v-for="option in options" :value="option.value" :key="option.value">
						             	{{ option.text }}
						            </option>
								</select>
							</div>
							<div class="form-group">
								<hr>
					      		<div class="row">
									<div class="col">
							        	<CButton class="btn btn-block btn-secondary">
								            <i class="far fa-times-circle"></i> Cancelar
								        </CButton>
							        </div>
							        <div class="col">
							        	<CButton class="btn btn-block btn-primary" @click="addPolicy">
								            <i class="far fa-check-circle"></i> Guardar
								        </CButton>
							        </div>
							    </div>
							</div>
						</CForm>
		          	</CCardBody>
		        </CCard>
	      	</CCol>
	      	<CCol class="col-9">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fa fa-align-justify"></i> Pólizas
		          	</CCardHeader>
		          	<CCardBody class="p-0">
		          		<table class="table table-responsive-sm table-hover table-striped table-sm">
							<thead>
								<tr class="text-center">
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th width="100px">Estado</th>
									<!-- <th width="100px">Acción</th> -->
								</tr>
							</thead>
							<tbody>
								<tr v-for="policy in policies">
						    		<td class="text-center">{{ policy.name }}</td>
						    		<td>{{ policy.description }}</td>
						    		<td class="text-center">
						    			<CBadge color="secondary">
							          		{{ policy.created_at }}
							          	</CBadge>
						    		</td>
						    		<td class="text-center">
						    			<CBadge color="warning" v-if="policy.updated_at">
						    				{{ policy.updated_at }}
						    			</CBadge>
						    		</td>
							        <td class="text-center">
							          	<CBadge :color="getStateBadge(policy.state)">
							          		{{ getValueState(policy.state) }}
							          	</CBadge>
							        </td>
						    		<!-- <td class="text-center">
						    			<CButtonGroup class="btn-group btn-group-sm">
									      	<CButton variant="outline" color="info" data-toggle="modal" :data-target="`#editRolModal${rol.id}`" @on="setId( rol.id )">
									      		<i class="far fa-edit"></i>
									      	</CButton>
									      	<CButton variant="outline" color="danger" data-toggle="modal" data-target="#deleteRolModal">
									      		<i class="far fa-trash-alt"></i>
									      	</CButton>
									    </CButtonGroup>
						    		</td> -->
						    	</tr>
							</tbody>
						</table>
		          	</CCardBody>
		        </CCard>
	      	</CCol>
	    </CRow>
  	</div>
</template>

<script>
	export default {
		name : 'policy-form',
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
				],
				id: '',
				policies: []
			}
	  	},
		created () {
			this.getPolicies()
		},
		methods: {
		    getStateBadge (state) {
				return ( state === '0') ? 'secondary' : 'success'	
		    },
		    getValueState (state) {
		      	return ( state === '0') ? 'Inactivo' : 'Activo'	
		    },
		    getPolicies () {
		    	fetch('poliza/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.policies = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.policy = {
			        name 	   : '',
    				description: '',
    				state 	   : ''
			    }
		    },
		    setId(value) {
                this.id = value
            },
		    addPolicy () {
		    	const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        body: JSON.stringify(this.policy),
			        cache: 'no-cache'
			    }

		    	fetch('poliza/create', config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
					        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.resetForm()
					        this.getPolicies()

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
		    deleteRol ( id ) {
		    	//
			}
		}
	};
</script>