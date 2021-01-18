<template>
	<div>
	    <CRow>
	      	<CCol class="col-3">
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fas fa-plus-circle fa-lg"></i> Nuevo Impuesto
		          	</CCardHeader>
		          	<CCardBody>
		            	<CForm accept-charset="UTF-8" id="formTax">
							<div class="form-group">
								<CInput id="name" v-model="tax.name" label="Nombre" placeholder="Nombre del impuesto" requiered/>
							</div>
							<div class="form-group">
								<CTextarea id="description" v-model="tax.description" label="Descripción" placeholder="Descripción del impuesto" rows="8" requiered/>
							</div>
							<div class="form-group">
								<CInput id="value" v-model="tax.value" label="Valor" placeholder="% del impuesto" requiered/>
							</div>
							<div class="form-group">
								<label for="state">Estado</label>
								<select class="form-control" id="state" name="state" v-model="tax.state" requiered>
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
							        	<CButton class="btn btn-block btn-primary" @click="addTax">
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
		            	<i class="fa fa-align-justify"></i> Impuestos
		          	</CCardHeader>
		          	<CCardBody class="p-0">
		          		<table class="table table-responsive-sm table-hover table-striped table-sm">
							<thead>
								<tr class="text-center">
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Valor %</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th width="100px">Estado</th>
									<!-- <th width="100px">Acción</th> -->
								</tr>
							</thead>
							<tbody>
								<tr v-for="tax in taxes">
						    		<td class="text-center">{{ tax.name }}</td>
						    		<td>{{ tax.description }}</td>
						    		<td class="text-center">{{ tax.value }}</td>
						    		<td class="text-center">
						    			<CBadge color="secondary">
							          		{{ tax.created_at }}
							          	</CBadge>
						    		</td>
						    		<td class="text-center">
						    			<CBadge color="warning" v-if="tax.updated_at">
						    				{{ tax.updated_at }}
						    			</CBadge>
						    		</td>
							        <td class="text-center">
							          	<CBadge :color="getStateBadge(tax.state)">
							          		{{ getValueState(tax.state) }}
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
		name : 'tax-form',
		data () {
    		return {
    			tax: {
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
				taxes: []
			}
	  	},
		created () {
			this.getTaxes()
		},
		methods: {
		    getStateBadge (state) {
				return ( state === '0') ? 'secondary' : 'success'	
		    },
		    getValueState (state) {
		      	return ( state === '0') ? 'Inactivo' : 'Activo'	
		    },
		    getTaxes () {
		    	fetch('impuesto/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.taxes = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    },
		    resetForm () {
		    	return this.tax = {
			        name 	   : '',
    				description: '',
    				state 	   : ''
			    }
		    },
		    setId(value) {
                this.id = value
            },
		    addTax () {
		    	const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        body: JSON.stringify(this.tax),
			        cache: 'no-cache'
			    }

		    	fetch('impuesto/create', config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
					        this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.resetForm()
					        this.getTaxes()

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