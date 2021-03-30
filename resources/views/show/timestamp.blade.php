<jet-detail>
    <template #key>
        {{ $field->title() }}
    </template>
    <template #value>
        <jet-timestamp :value="@stubkit('{{ model.camel }}.{{ field.snake }}')" />
    </template>
</jet-detail>
