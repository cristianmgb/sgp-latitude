<template>
    <div class="form-group">
        <label class="col-form-label" :for="id">
            {{ label }}
        </label>
        <ValidationProvider
            :name="name"
            ref="provider"
            rules="required|image"
            v-slot="{ validate, errors, ariaInput, ariaMsg  }"
        >
            <input
                :id="id"
                :label="label"
                :name="name"
                type="file"
                v-bind="ariaInput"
                class="form-control mb-2"
                :class="{ 'is-invalid': errors[0] }"
                @change="handleFileChange"
            >
            <AlertError :errors="errors[0]"></AlertError>
        </ValidationProvider>
    </div>
</template>

<script>
    import { ValidationProvider } from "vee-validate";
    import AlertError from './AlertError'

    export default {
        name: "InputImageBlock",
        components: { ValidationProvider, AlertError },
        props: {
            id: {
                type: String,
                default: ""
            },
            name: {
                type: String,
                default: ""
            },
            label: {
                type: String,
                default: ""
            }
        },
        methods: {
            async handleFileChange(files) {
                const { valid } = await this.$refs.provider.validate(files);

                return (valid) ? true : false;
            }
        }
    };
</script>