<template>
    <div class="form-group">
        <label
            :for="id"
            class="col-form-label"
            @click="$refs.input.focus()"
        >
            {{ label }}
        </label>
        <ValidationProvider
            :rules="rules"
            :name="name || label"
            v-slot="{ errors, required, ariaInput, ariaMsg }"
        >
            <input
                :id="name"
                :type="type"
                :label="label"
                :placeholder="placeholder"
                ref="input"
                v-model="innerValue"
                v-bind="ariaInput"
                autocomplete="off"
                class="form-control mb-2"
                :class="{ 'is-invalid': errors[0] }"
            >
            <AlertError :errors="errors[0]"></AlertError>
        </ValidationProvider>
    </div>
</template>

<script>
    import { ValidationProvider } from "vee-validate";
    import AlertError from './AlertError'

    export default {
        name: "InputBlock",
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
            },
            rules: {
                type: [Object, String],
                default: ""
            },
            placeholder: {
                type: String,
                default: ""
            },
            type: {
                type: String,
                default: "text",
                validator(value) {
                    return [
                        "url",
                        "text",
                        "password",
                        "tel",
                        "search",
                        "number",
                        "email",
                        "file"
                    ].includes(value);
                }
            },
            value: {
                type: null,
                default: ""
            }
        },
        data: () => ({
            innerValue: ""
        }),
        computed: {
            hasValue() {
              return !!this.innerValue;
            }
        },
        watch: {
            innerValue(value) {
                this.$emit("input", value);
            },
            value(val) {
                if (val !== this.innerValue) {
                    this.innerValue = val;
                }
            }
        },
        created() {
            if (this.value) {
                this.innerValue = this.value;
            }
        }
    };
</script>