<template>
    <span v-text="display" />
</template>

<script>
export default {
    props: ['value'],

    computed: {
        display() {
            return new Date(this.value).toLocaleString();
        },
    }
}
</script>

