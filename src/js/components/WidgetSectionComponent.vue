<template>
    <CRow>
        <CCol>
            <Widget :header=parseInt(this.projects) text="Proyectos" />
        </CCol>
        <CCol>
        	<Widget :header=parseInt(this.associates) text="Asociados" />
        </CCol>
        <CCol>
            <Widget :header=parseInt(this.contractors) text="Contratistas" />
        </CCol>
        <CCol>
            <Widget :header=parseInt(this.policies) text="Pólizas" />
        </CCol>
        <CCol>
            <Widget :header=parseInt(this.taxes) text="Impuestos" />
        </CCol>
        <CCol>
            <Widget :header=parseInt(this.users) text="Usuarios" />
        </CCol>
    </CRow>
</template>

<script>
    import Widget from './WidgetComponent.vue'

	export default {
	  	name: 'WidgetSectionComponent',
	  	components: { Widget },
        data () {
            return {
                associates : '',
                contractors: '',
                policies   : '',
                projects   : '',
                taxes      : '',
                users      : ''
            }
        },
        created () {
            this.getAssociates()
            this.getContractors()
            this.getPolicies()
            this.getProjects()
            this.getTaxes()
            this.getUsers()
        },
        methods: {
            getAssociates () {
                fetch('admin/asociado/getAll')
                    .then( response => response.json() )
                    .then( result   => {
                        this.associates = result.data.length
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getContractors () {
                fetch('admin/contratista/getAll')
                    .then( response => response.json() )
                    .then( result   => {
                        this.contractors = result.data.length
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getPolicies () {
                fetch('admin/poliza/getAll')
                    .then( response => response.json() )
                    .then( result   => {
                        this.policies = result.data.length
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getProjects () {
                fetch('admin/proyecto/getAll')
                    .then( response => response.json() )
                    .then( result   => {
                        this.projects = result.data.length
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getTaxes () {
                fetch('admin/impuesto/getAll')
                    .then( response => response.json() )
                    .then( result   => {
                        this.taxes = result.data.length
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getUsers () {
                fetch('admin/usuario/getAll')
                    .then( response => response.json() )
                    .then( result   => {
                        this.users = result.data.length
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            }
        }
	};
</script>