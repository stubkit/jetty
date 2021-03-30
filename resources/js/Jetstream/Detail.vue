<template>
    <div class="flex">
        <dt class="px-4 py-5 font-bold text-gray-500">
            <slot name="key"></slot>
        </dt>
        <dd class="px-4 py-5 ">
            <slot name="value"></slot>
        </dd>
    </div>
</template>
