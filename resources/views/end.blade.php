@extends('response')

@section('response-body')
    <Say voice="woman" language="en"> That was a fun game!</Say>
    <Gather timeout="10" finishOnKey="*" action="/buzzphone/voice/play" method="GET">
        <Say voice="woman" language="en"> Would you like to play again? Press any number to play again with me! </Say>
    </Gather>
    <Say voice="woman" language="en"> You're right, I'm tired too. It is probably better to take a nap
    after all that fun. I hope to hear back from you soon!</Say>
@endsection