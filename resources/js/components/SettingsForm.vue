<template>
    <CRow>
        <CCol>
            <CCard class="card-accent-primary">
                <CCardHeader>
                    <i class="fa fa-align-justify"></i> Panel del configuración del CMS
                </CCardHeader>
                <CCardBody>
                    <ValidationObserver ref="form">
                        <CForm @submit.prevent="onSubmit" enctype="multipart/form-data">
                            <CRow>
                                <CCol md="3" lg="3">
                                    <div v-if="src">
                                        <img :src="src" alt="Logo de la Empresa" class="img-fluid img-thumbnail">
                                    </div>
                                    <div v-else>
                                        <img src="https://via.placeholder.com/500x500?text=Logo empresa" class="img-fluid img-thumbnail">
                                    </div>
                                </CCol>
                                <CCol md="9" lg="9">
                                    <CRow>
                                        <CCol>
                                            <InputBlock
                                                id="name"
                                                label="Nombre"
                                                type="text"
                                                placeholder="Nombre para el CMS"
                                                rules="required|alpha_spaces|min:5"
                                                v-model="name"
                                            />
                                            <InputBlock
                                                id="email"
                                                label="Correo electrónico"
                                                type="email"
                                                placeholder="info@example.com"
                                                rules="required|email"
                                                v-model="email"
                                            />
                                            <div class="form-group">
                                                <label
                                                    for="avatar"
                                                    class="col-form-label"
                                                    @click="$refs.provider.focus()"
                                                >Logo del CMS</label>
                                                <ValidationProvider
                                                    name="Logo"
                                                    ref="provider"
                                                    rules="required|image"
                                                    v-slot="{ validate, errors, ariaInput, ariaMsg  }"
                                                >
                                                    <input
                                                        id="avatar"
                                                        name="avatar"
                                                        type="file"
                                                        v-bind="ariaInput"
                                                        ref="fileInput"
                                                        class="form-control mb-2"
                                                        :class="{ 'is-invalid': errors[0] }"
                                                        @change="handleFileChange"
                                                    >
                                                    <AlertError :errors="errors[0]"></AlertError>
                                                </ValidationProvider>
                                            </div>
                                            <button type="submit" class="btn btn-dark px-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg> Guardar
                                            </button>
                                        </CCol>
                                        <CCol>
                                            <TextAreaBlock
                                                id="bio"
                                                rows="12"
                                                label="Descripción del CMS"
                                                placeholder="Descripción del CMS..."
                                                rules="required|min:30"
                                                v-model="bio"
                                            />
                                        </CCol>
                                    </CRow>
                                </CCol>
                            </CRow>
                        </CForm>
                    </ValidationObserver>
                </CCardBody>
            </CCard>
        </CCol>
    </CRow>
</template>

<script>
    import InputBlock from '../templates/InputBlock'
    import InputImageBlock from '../templates/InputImageBlock'
    import TextAreaBlock from '../templates/TextAreaBlock'
    import AlertError from '../templates/AlertError'

    export default {
        name : 'settings-form',
        components: { InputBlock, InputImageBlock, TextAreaBlock, AlertError },
        data() {
            return {
                src   : '',
                name  : '',
                email : '',
                bio   : ''
            }
        },
        methods: {
            onSubmit() {
                this.$refs.form.validate().then(success => {

                    if (!success) {
                        return;
                    }

                    let currentObj = this;
                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        }
                    }

                    const data = new FormData();
                    data.append('avatar', this.$refs.fileInput.files[0]);
                    data.append('name', this.name);
                    data.append('email', this.email);
                    data.append('bio', this.bio);

                    console.log(data)

                    axios.post('settings', data, config)
                        .then( response => response.json() )
                        .then( result   => {

                            if ( result.statusCode === 200 ) {
                                this.$toast.success('<i class="fas fa-check"></i> ' + result.message)
                                // this.resetForm()

                                this.$nextTick(() => {
                                    this.$refs.form.reset();
                                });
                            }

                            if ( result.statusCode === 500 ) {
                                this.$toast.info('<i class="fas fa-info-circle"></i> ' + result.message)
                                return ;
                            }
                        }).catch(function(err) {
                            console.error(err)
                        });
                });
            },
            async handleFileChange(files) {
                const valid = await this.$refs.provider.validate(files);

                return (valid) ? true : false;
            }
        }
    };
</script>