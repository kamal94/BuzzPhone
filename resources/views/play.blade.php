@extends('response')
@section('response-body')
    <Gather timeout="5" finishOnKey="*" action="../result" method="POST">
        <Say voice="woman" language="en">{!! $say_text !!} </Say>
    </Gather>
    <Redirect method="POST">
        ../result?Digits=TIMEOUT
    </Redirect>
@endsection