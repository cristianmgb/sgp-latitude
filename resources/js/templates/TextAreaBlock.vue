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
            :name="label"
            v-slot="{ errors, required, ariaInput, ariaMsg }"
        >
            <textarea
                :id="id"
                :label="label"
                :placeholder="placeholder"
                :rows="rows"
                :cols="cols"
                ref="input"
                v-model="innerValue"
                v-bind="ariaInput"
                autocomplete="off"
                class="form-control mb-2"
                :class="{ 'is-invalid': errors[0] }"
            ></textarea>
            <AlertError :errors="errors[0]"></AlertError>
        </ValidationProvider>
    </div>
</template>

<script>
    import { ValidationProvider } from "vee-validate";
    import AlertError from './AlertError'

    export default {
        name: "TextAreaBlock",
        components: { ValidationProvider, AlertError },
        props: {
            id: {
                type: String,
                default: ""
            },
            label: {
                type: String,
                default: ""
            },
            rows: {
                type: String,
                default: ""
            },
            cols: {
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