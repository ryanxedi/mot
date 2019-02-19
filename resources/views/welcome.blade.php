<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>Check My MOT</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(function() {
                $('#registration').on('keypress', function(e) {
                    if (e.which == 32)
                        return false;
                });
            });
        </script>

        <style>
            .numberplate {
                width:750px; 
                height:180px;
                padding-top: 50px
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="m-b-md"><h1>Enter your registration number</h1></div>
                <form method="POST" action="your-car">
                @csrf
                    <input autofocus
                        name="registration" 
                        maxlength="7" 
                        id="registration" 
                        class="numberplate" 
                        placeholder="Your Reg"
                        @if (\Session::has('error')) style="border:3px solid red" @endif
                        >
                    <br>
                    <button class="btn btn-primary" style="margin:20px 0; width:60%" type="submit">Lets go</button>
                    <br> 
                @if (\Session::has('error'))
                    <span style="color:red"> {!! \Session::get('error') !!} </span>
                @endif                   
                </div>



            </div>
        </div>
    </body>

</html>
