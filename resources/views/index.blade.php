@inject('helper', 'StubKit\Support\Fields')
<jet-table :data="{{ model.camelPlural  }}" :cells="@{{ fields.array }}" to="{{ model.slugPlural  }}.show">
@foreach($helper->get('index', $fields) as $field)
        @include($field->view(), $field->data())
@endforeach
    <template #tr.after="{ value: {{ model.camel  }} }">
        <jet-dropdown-dots direction="vertical">
            <jet-dropdown-link :href="route('{{ model.slugPlural  }}.edit', {{ model.camel  }}.id)">
                Edit
            </jet-dropdown-link>
            <jet-dropdown-link :href="route('{{ model.slugPlural  }}.destroy', {{ model.camel  }}.id)" method="delete">
                Delete
            </jet-dropdown-link>
        </jet-dropdown-dots>
    </template>
</jet-table>

