<template>
    <div>
        <div v-if="name">{{ name }}</div>
        <secondary-button @click="$refs.input.click()">
            {{ name ? 'Replace' : 'Choose' }}
        </secondary-button>
        <input type="file" class="hidden" @input="$emit('update:modelValue', $event.target.files[0])" ref="input">
    </div>
</template>

<script>
import SecondaryButton from "./SecondaryButton";
export default {
    components: {SecondaryButton},
    props: ['modelValue'],

    emits: ['update:modelValue'],

    data() {
        return {
            name: null
        }
    },

    mounted() {
        this.name = this.modelValue
            ? 'file.' + this.modelValue.split('.')[1]
            : '';

        if(this.modelValue) {
            this.$emit('update:modelValue', null)
        }
    },

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>

