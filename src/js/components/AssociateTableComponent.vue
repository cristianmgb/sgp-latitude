<template>
	<div>
	    <CRow>
	      	<CCol>
		        <CCard class="card-accent-primary">
		          	<CCardHeader>
		            	<i class="fa fa-align-justify"></i> Asociados
		          	</CCardHeader>
		          	<CCardBody class="p-0">
		          		<table class="table table-responsive-sm table-hover table-striped table-sm">
							<thead>
								<tr class="text-center">
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Correo</th>
									<th>Teléfono</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th width="100px">Estado</th>
									<!-- <th width="100px">Acción</th> -->
								</tr>
							</thead>
							<tbody>
								<tr v-for="associate in associates">
						    		<td class="text-center">{{ associate.first_name }}</td>
						    		<td>{{ associate.last_name }}</td>
						    		<td class="text-center">{{ associate.email }}</td>
						    		<td class="text-center">{{ associate.phone }}</td>
						    		<td class="text-center">
						    			<CBadge color="secondary">
							          		{{ associate.created_at }}
							          	</CBadge>
						    		</td>
						    		<td class="text-center">
						    			<CBadge color="warning" v-if="associate.updated_at">
						    				{{ associate.updated_at }}
						    			</CBadge>
						    		</td>
							        <td class="text-center">
							          	<CBadge :color="getStateBadge(associate.state)">
							          		{{ getValueState(associate.state) }}
							          	</CBadge>
							        </td>
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
		name : 'associate-table',
		data () {
    		return {
				associates: []
			}
	  	},
		created () {
			this.getAssociates()
		},
		methods: {
		    getStateBadge (state) {
				return ( state === '0') ? 'secondary' : 'success'	
		    },
		    getValueState (state) {
		      	return ( state === '0') ? 'Inactivo' : 'Activo'	
		    },
		    getAssociates () {
		    	fetch('asociado/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.associates = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    }
		}
	};
</script>