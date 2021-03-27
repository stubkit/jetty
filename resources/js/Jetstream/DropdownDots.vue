<template>
    <jet-dropdown align="right" width="60">
        <template #trigger>
            <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-black focus:outline-none focus:text-black active:text-black transition ease-in-out duration-150">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path v-if="direction === 'vertical'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        <path v-if="direction === 'horizontal'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </button>
            </span>
        </template>

        <template #content>
            <div class="w-60 text-base font-normal normal-case tracking-normal">
                <slot></slot>
            </div>
        </template>
    </jet-dropdown>
</template>
<script>
import JetDropdown from "@/Jetstream/Dropdown";

export default {
    props: {
        direction: {
            default: 'horizontal'
        }
    },
    components: {
        JetDropdown
    }
}
</script>
