<template>
    <div class="form-group">
        <label
            :for="id"
            @click="$refs.input.focus()"
        >
            {{ label }}
        </label>
        <ValidationProvider
            :rules="rules"
            :name="name || label"
            v-slot="{ errors, required, ariaInput, ariaMsg }"
        >
            <select
                :id="name"
                :label="label"
                ref="input"
                v-model="innerValue"
                v-bind="ariaInput"
                class="form-control mb-0"
                :class="{ 'is-invalid': errors[0] }"
            >
                <option v-for="(option, index) in options" :value="option.value" :key="index">
                    {{ option.text }}
                </option>
            </select>
            <AlertError :errors="errors[0]"></AlertError>
        </ValidationProvider>
    </div>
</template>

<script>
    import { ValidationProvider } from "vee-validate";
    import AlertError from './AlertError'

    export default {
        name: "SelectHorizontal",
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
            options: {
                type: [Object, String],
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