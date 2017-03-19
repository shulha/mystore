@extends('template')

@section('content')

    @php
    $hello = 'Hello'
    @endphp

    <p>{{ $hello }}, {{ $name }}</p>
    <p>{{ date("Y-m-d H:i:s") }}</p>
    <p>Smart {{ $second }}<br>
    <b>{{ $id }}</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
    Aliquam, aliquid asperiores autem cum deleniti error excepturi id laboriosam modi necessitatibus odit officia officiis vero.<br>
    Accusantium autem dolores recusandae rerum velit.</p>

    <p>{{ '<button>Escaped</button>' }}</p>

    <p>{!! '<button>Button</button>' !!}</p>

@stop
