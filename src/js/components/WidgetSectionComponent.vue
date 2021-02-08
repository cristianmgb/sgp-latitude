<template>
    <CRow>
        <CCol>
        	<Widget
                :header="associates"
                text="Asociados"
            />
        </CCol>
        <CCol>
            <Widget
                :header="contractors"
                text="Contratistas"
            />
        </CCol>
        <CCol>
            <Widget
                :header="policies"
                text="Pólizas"
            />
        </CCol>
        <!-- <CCol>
            <Widget
                :header="projects"
                text="Proyectos"
            />
        </CCol> -->
        <CCol>
            <Widget
                :header="taxes"
                text="Impuestos"
            />
        </CCol>
        <!-- <CCol>
            <Widget
                :header="users"
                text="Usuarios"
            />
        </CCol> -->
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
            // this.getProjects()
            this.getTaxes()
            // this.getUsers()
        },
        methods: {
            getAssociates () {
                fetch('admin/asociado/getAll')
                    .then( response => response.json() )
                    .then( data     => {
                        this.associates = data.rows
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getContractors () {
                fetch('admin/contratista/getAll')
                    .then( response => response.json() )
                    .then( data     => {
                        this.contractors = data.rows
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getPolicies () {
                fetch('admin/poliza/getAll')
                    .then( response => response.json() )
                    .then( data     => {
                        this.policies = data.rows
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getProjects () {
                fetch('admin/proyecto/getAll')
                    .then( response => response.json() )
                    .then( data     => {
                        this.projects = data.rows
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getTaxes () {
                fetch('admin/impuesto/getAll')
                    .then( response => response.json() )
                    .then( data     => {
                        this.taxes = data.rows
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            },
            getUsers () {
                fetch('admin/usuario/getAll')
                    .then( response => response.json() )
                    .then( data     => {
                        this.users = data.rows
                    }).catch( function(error) {
                        this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
                    })
            }
        }
	};
</script>