<template #td.{{ $field->snake()  }}="{ value }">
    <span :title="value">@{{ value }}}</span>
</template>
