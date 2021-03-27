@inject('helper', 'StubKit\Support\Fields')
<div class="bg-white rounded-md shadow overflow-x-auto">
    <table class="w-full whitespace-nowrap" cellspacing="0" cellpadding="0">
        <tr class="text-left font-bold border-b">
@foreach($helper->str($fields) as $field)
            <th class="px-6 pt-6 pb-4">{{ $field->title() }}</th>
@endforeach
            <th></th>
        </tr>

        <tr v-for="@{{ model.camel }} in @{{ model.camelPlural }}.data" @click="$inertia.visit(route('@{{model.slugPlural}}.show', @{{model.camel}}.id))" :key="@{{ model.camel }}.id" class="cursor-pointer hover:bg-gray-50 focus-within:bg-gray-100 border-b">
@foreach($helper->get('index', $fields) as $field)
            @include($field->view(), $field->data())
@endforeach
        </tr>
    </table>
</div>
