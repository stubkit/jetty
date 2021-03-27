@inject('helper', 'StubKit\Support\Fields')
<div class="bg-white rounded-md shadow overflow-x-auto">
    <table class="w-full border-t border-gray-200">
@foreach($helper->get('show', $fields) as $field)
        @include($field->view(), $field->data())
@endforeach
    </table>
</div>
