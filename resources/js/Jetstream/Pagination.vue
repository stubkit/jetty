<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <button @click="visit(link.url)" v-else class="bg-gray-50 mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white hover:border-black focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        links: Array,
        ajax: Boolean,
    },
    methods: {
        visit(url) {
            if(this.ajax) {
                this.$emit('clicked', url); return;
            }

            this.$inertia.visit(url)
        }
    }
}
</script>
