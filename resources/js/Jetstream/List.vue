<template>
    <div class="bg-white shadow rounded-md">
        <div v-if="data.data && data.data.length">
            <ul class="divide-y divide-gray-200">
                <li v-for="item in data.data" :key="item.id" @click="visit(item)" class="p-5 relative" :class="{'cursor-pointer hover:bg-gray-50': this.to}">
                    <slot name="item" :value="item" >
                        id: {{ item.id }}
                    </slot>
                </li>
            </ul>
            <jet-pagination :links="data.links" class="p-5 border-t" />
        </div>
        <div v-else>
            <div class="px-6 py-12 bg-white overflow-hidden shadow-md rounded-lg text-gray-600">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-16 w-16">
                        <path d="M6 2h6v6c0 1.1.9 2 2 2h6v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2z" class="fill-current text-gray-300"></path>
                        <polygon points="14 2 20 8 14 8" class="fill-current text-gray-500"></polygon>
                    </svg>
                </div>
                <div class="mt-4 text-center max-w-xl mx-auto">
                    <slot name="empty">
                        nothing to see here..
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import JetPagination from "@/Jetstream/Pagination";

export default {
    props: ['data', 'to'],
    components: { JetPagination },
    methods: {
        visit(item) {
            if(this.to) {
                this.$inertia.visit(
                    route(this.to, item.id)
                )
            }
        }
    }
}
</script>
