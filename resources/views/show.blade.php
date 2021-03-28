@inject('helper', 'StubKit\Support\Fields')
@foreach($helper->get('show', $fields) as $field)
@include($field->view(), $field->data())
@endforeach
