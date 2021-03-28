@inject('helper', 'StubKit\Support\Fields')
@foreach($helper->get('index', $fields) as $field)
@include($field->view(), $field->data())
@endforeach
