@extends('response')
@section('response-body')
    <Say voice="woman" language="en">{!! $say_text !!}</Say>
    <Redirect method="GET">../play</Redirect>
@endsection