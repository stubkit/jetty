<jet-detail>
    <template #key>
        {{ $field->title() }}
    </template>
    <template #value>
        <img :src="@stubkit('{{ model.camel }}.{{ field.snake }}')" />
    </template>
</jet-detail>
