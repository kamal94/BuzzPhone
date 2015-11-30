@extends('response')
@section('response-body')

    <Gather timeout="5" finishOnKey="*" action="/buzzphone/voice/result" method="GET">
        <Say voice="woman" language="en">{!! $say_text !!} </Say>
    </Gather>
    <Redirect method="GET">
        /buzzphone/voice/result?Digits=TIMEOUT
    </Redirect>
@endsection