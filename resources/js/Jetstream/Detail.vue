<template>
    <div class="py-4  sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 px-6">
        <dt class="font-bold text-gray-400">
            <slot name="key"></slot>
        </dt>
        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
            <slot name="value"></slot>
        </dd>
    </div>
</template>
