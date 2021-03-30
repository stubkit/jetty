<jet-detail>
    <template #key>
        {{ $field->title() }}
    </template>
    <template #value>
        @stubkit('{{ {{ model.camel }}.{{ field.snake }} }}')

    </template>
</jet-detail>
