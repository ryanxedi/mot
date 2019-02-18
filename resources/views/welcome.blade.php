<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOT App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <script src="jquery-1.8.3.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script>
        jQuery(function($){
            $('#registration').keyup(function(e){
                if (e.which === 32) {
                    alert('No space are allowed in usernames');
                    var str = $(this).val();
                    str = str.replace(/\s/g,'');
                    $(this).val(str);            
                }
            }).blur(function() {
                var str = $(this).val();
                str = str.replace(/\s/g,'');
                $(this).val(str);            
            });
        });
        </script>

        <style>
        @font-face {
              font-family: 'UKNumberPlate';
              src: url('fonts/UKNumberPlate.ttf');
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .numberplate {
                background:yellow; 
                border-radius: 5px; 
                font-family:UKNumberPlate; 
                font-size:170px; 
                text-align: center; 
                width:750px; 
                height:180px;
                border: 3px solid #666;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">Enter your registration number</div>
                <form method="POST" action="car">
                @csrf
                    <input name="registration" maxlength="7" id="registration" class="numberplate" placeholder="Your Reg">
                    <br>
                    <button class="btn btn-primary" style="margin:20px 0; width:60%" type="submit">Lets go</button>                    
                </div>
            </div>
        </div>
    </body>

</html>
