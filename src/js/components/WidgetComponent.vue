<template>
	<CWidgetIcon color="primary" :text="text">
        {{ header }}
    </CWidgetIcon>
</template>

<script>
	export default {
	  	name: 'WidgetComponent',
	  	props: {
            header: {
                type: Number,
                default: ""
            },
            text: {
                type: String,
                default: ""
            }
        }
	};
</script>