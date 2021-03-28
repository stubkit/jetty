<template #td.{{ $field->snake()  }}="{ value }">
    <img :src="value" class="rounded-full w-8 h-8 -my-2"/>
</template>
