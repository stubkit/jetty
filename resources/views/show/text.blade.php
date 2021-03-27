    <tr class="border-b">
        <td class="px-4 py-5 font-bold text-gray-500">{{ $field->title() }}</td>
        <td class="px-4 py-5 ">@stubkit('{{ {{ model.camel }}.{{ field.snake }} }}')</td>
    </tr>
