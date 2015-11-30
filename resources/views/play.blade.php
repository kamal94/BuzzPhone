@extends('response')
@section('response-body')

    <Say>We didn't receive any input. Goodbye!</Say>
    <Gather timeout="5" finishOnKey="*" action="/buzzphone/voice/result" method="GET">
        <Say voice="woman" language="en">{!! $say_text !!} </Say>
    </Gather>
    <Say>We didn't receive any input. Goodbye!</Say>
    <Redirect method="GET">
        /buzzphone/voice/result?Digits=TIMEOUT
    </Redirect>
@endsection