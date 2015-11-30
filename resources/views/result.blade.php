@extends('response')

@section('response-body')
    <Say voice="woman" language="en">{!! $say_text !!} </Say>
@endsection