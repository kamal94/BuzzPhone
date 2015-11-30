@extends('response')
@section('response-body')

    <Say>We didn't receive any input. Goodbye!</Say>
    <Gather timeout="5" finishOnKey="*" action="/buzzphone/voice/result" method="POST">
        <Say voice="woman" language="en">{!! $say_text !!} </Say>
    </Gather>
    <Say>We didn't receive any input. Goodbye!</Say>
@endsection