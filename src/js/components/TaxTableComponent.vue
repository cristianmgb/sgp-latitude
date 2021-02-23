<template>
	<div>
		<table class="table table-responsive-sm table-hover table-striped table-sm">
			<thead>
				<tr class="text-center">
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Creado</th>
					<th>Modificado</th>
					<th width="100px">Estado</th>
					<th width="100px">Acción</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="tax in taxes">
		    		<td class="text-center">{{ tax.name }}</td>
		    		<td>{{ tax.description }}</td>
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
		    		<td class="text-center">
		    			<CButtonGroup class="btn-group btn-group-sm">
		    				<CLink class="btn btn-outline-info" :href="`taxes/${tax.id}/edit`">
						        <i class="far fa-edit"></i>
						    </CLink>
					      	<CButton
					      		variant="outline" color="danger"
					      		@click="getId(tax.id)"
					      		data-toggle="modal" data-target="#deleteModal"
					      	>
					      		<i class="far fa-trash-alt"></i>
					      	</CButton>
					    </CButtonGroup>
		    		</td>
		    	</tr>
			</tbody>
		</table>

	    <div class="modal fade modal-danger" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteTitle" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      	<div class="modal-header">
				        <h5 class="modal-title" id="deleteTitle">
				        	<i class="far fa-trash-alt"></i> Eliminar
				        </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			      	<div class="modal-body text-center">
		      			<CRow>
							<CCol>
								<h4>¿ Está seguro de eliminar este registro ?</h4>
							</CCol>
						</CRow>
						<hr>
			        	<CRow>
							<CCol>
					        	<CButton color="secondary" class="btn-block" data-dismiss="modal">
						            <i class="far fa-times-circle"></i> Cancelar
						        </CButton>
					        </CCol>
					        <CCol>
					        	<CButton color="danger" class="btn-block" @click="deleteTax()">
						            <i class="far fa-check-circle"></i> Eliminar
						        </CButton>
					        </CCol>
					    </CRow>
			      	</div>
			    </div>
		  	</div>
		</div>
  	</div>
</template>

<script>
	export default {
		name : 'tax-table',
		data () {
    		return {
    			id: '',
				taxes: []
			}
	  	},
		created () {
			this.getTaxes()
		},
		methods: {
    		getId ( val ) {
    			return this.id = val
    		},
		    getStateBadge (state) {
				return ( state === '0') ? 'secondary' : 'success'
		    },
		    getValueState (state) {
		      	return ( state === '0') ? 'Inactivo' : 'Activo'
		    },
		    getTaxes () {
		    	fetch('taxes/get_all')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.taxes = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	})
		    },
		    deleteTax() {
				const config = {
			        method: 'POST',
			        headers: {
			        	'Content-Type': 'application/json',
			        	'X-Requested-With': 'XMLHttpRequest'
			        },
			        cache: 'no-cache'
			    }

				fetch('taxes/delete/'+ this.id , config)
				    .then( response => response.json() )
				    .then( result   => {

				    	if ( result.statusCode === 200 ) {
				    		$('#deleteModal').modal('hide')
				    		this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
				    		this.id = ''
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
			}
		}
	};
</script>