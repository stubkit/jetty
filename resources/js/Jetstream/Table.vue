<template>
    <div class="bg-white shadow rounded-md">
        <div v-if="items.data && items.data.length">
            <table class="whitespace-nowrap w-full" cellspacing="0" cellpadding="0">
                <thead>
                    <tr class="text-left font-bold border-b">
                        <th class="px-6 pt-6 pb-4" v-for="th in cells">
                            <slot :name="`th.${th}`">
                                <span class="capitalize">
                                    {{ th.replace('_', ' ') }}
                                </span>
                            </slot>
                        </th>
                        <th v-if="$slots['tr.after']"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="item in items.data" :key="item.id" :class="{ 'cursor-pointer hover:bg-gray-50': this.to }">
                        <td v-for="cell in cells" @click="visit(item)" class="px-6 py-4">
                            <slot :name="`td.${cell}`" :value="item[cell]">
                                {{ item[cell] }}
                            </slot>
                        </td>
                        <td v-if="$slots['tr.after']">
                            <div class="flex justify-end">
                                <slot name="tr.after" :value="item"></slot>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <jet-pagination
                class="p-5 border-t"
                :links="items.links"
                @clicked="get"
                :ajax="ajax"
            />
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
import JetPagination from '@/Jetstream/Pagination'

export default {
    components: {
        JetPagination
    },
    props: {
        cells: Array,
        data: Object,
        to: String,
        ajax: Boolean
    },
    mounted() {
        this.items = ! this.data.data
            ? { data: this.data }
            : this.data
    },
    data() {
        return {
            items: []
        }
    },
    methods: {
        visit(item) {
            if(this.to) {
                this.$inertia.visit(
                    route(this.to, item.id)
                )
            }
        },
        get(url) {
            axios.get(url,  {
                headers: { 'Content-Type': 'application/json' }
            }).then(response => {
                this.items = response.data;
            })
        }
    }
}
</script>
