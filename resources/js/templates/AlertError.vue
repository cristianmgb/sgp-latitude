<template>
	<CAlert
		color="danger"
		class="text-danger p-1 mb-0 mt-1"
		v-show="errors"
	>
      	{{ errors }}
    </CAlert>
</template>

<script>
	export default {
	  	name : 'AlertError',
	  	props: {
		    errors: {
		      	type: [Object, String],
		      	default: ""
		    }
		}
	};
</script>