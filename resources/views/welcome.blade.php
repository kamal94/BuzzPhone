<!DOCTYPE html>
<html>
    <head>
        <title>BuzzPhone</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .content-text{
                font-size: 32px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">BuzzPhone</div>
                <div class="content-text">Send your friend a game of FizzBuzz</div>
                {!! Form::open(['url' => '/buzzphone/voice/', 'method' => 'POST']) !!}
                    {!! Form::input('number', 'phone_number', "", ['placeholder' => "A friend's phone number"]) !!}
                    {!! Form::submit('Send') !!}
                {!! Form::close() !!}

                @if (isset($error))
                    <div class="alert alert-danger">
                        {!! $error !!}
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
