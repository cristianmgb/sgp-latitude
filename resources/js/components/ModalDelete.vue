<template>
	<div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-modal="true">
		<div class="modal-dialog modal-dialog-centered modal-danger" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="far fa-trash-alt"></i> Eliminar</h4>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times-circle text-white"></i>
					</button>
				</div>
				<div class="modal-body text-center">
					<h4>¿ Está seguro de eliminar este registro ?</h4>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
					<button class="btn btn-danger" type="button">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
	  	name: 'modal-delete',
	  	// props: {
    //         id: {
    //             type: Number,
    //             default: ""
    //         }
    //     },
	  	data() {
      		return {

	    	};
	  	},
	  	methods: {

	  	}
	};
</script>