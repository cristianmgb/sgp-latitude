<template>
	<div>
	    <CRow>
	      	<CCol>
		        <CCard>
		          	<CCardBody class="p-0">
		          		<table class="table table-dark table-responsive-sm table-hover table-striped table-sm mb-0">
							<thead>
								<tr class="text-center text-uppercase">
									<th colspan="2">factura</th>
								</tr>
							</thead>
							<tbody>
								<tr>
						    		<td class="text-left">Valor bruto</td>
						    		<td class="text-right">100000</td>
						    	</tr>
								<tr class="text-center">
									<td><strong>Impuesto</strong></td>
									<td><strong>Valor</strong></td>
								</tr>
								<tr>
						    		<td class="text-left"> {{ taxes[2].name }} ({{ taxes[2].value }} %)</td>
						    		<td class="text-right">12000</td>
						    	</tr>
						    	<tr>
						    		<td class="text-left"> {{ taxes[3].name }} ({{ taxes[3].value }} %)</td>
						    		<td class="text-right">12000</td>
						    	</tr>
						    	<tr>
						    		<td class="text-left"> {{ taxes[1].name }} ({{ taxes[1].value }} %)</td>
						    		<td class="text-right">12000</td>
						    	</tr>
						    	<tr>
						    		<td class="text-left"> {{ taxes[5].name }} ({{ taxes[5].value }} %)</td>
						    		<td class="text-right">12000</td>
						    	</tr>
						    	<tr class="text-center">
									<td colspan="2"><strong>Pago</strong></td>
								</tr>
								<tr>
						    		<td class="text-left">Ing. Banco</td>
						    		<td class="text-right">100000</td>
						    	</tr>
								<tr class="text-center">
									<td colspan="2"><strong>Impuesto por la Empresa</strong></td>
								</tr>
								<tr>
						    		<td class="text-left"> {{ taxes[6].name }} ({{ taxes[6].value }} %)</td>
						    		<td class="text-right">12000</td>
						    	</tr>
						    	<tr>
						    		<td class="text-left"> {{ taxes[3].name }} ({{ taxes[3].value }} %)</td>
						    		<td class="text-right">12000</td>
						    	</tr>
						    	<tr>
						    		<td class="text-left"> {{ taxes[3].name }} ({{ taxes[3].value }} %)</td>
						    		<td class="text-right">12000</td>
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
		name : 'taxes-table-project',
		data () {
    		return {
				taxes: []
			}
	  	},
		created () {
			this.getTaxes()
		},
		methods: {
		   	getTaxes () {
		    	fetch('../impuesto/getAll')
				  	.then( response => response.json() )
				  	.then( data => {
				  		this.taxes = data.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	});
		    }
		}
	};
</script>