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

        <script>
        jQuery(function($){
            $('#numberPlate').keyup(function(e){
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
                width:740px; 
                height:165px;
                border: 3px solid #666;
                color:#333;
                padding-bottom: 50px;
            }
        </style>

    </head>
    <body>


        <div style="padding:60px 0" class="flex-center">
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
                @foreach($carsInformation as $carInformation)
                    <div class="numberplate">
                        {{ $carInformation->registration }}
                    </div>
                    <h2>
                        <?php $year = substr($carInformation->firstUsedDate, 0, 4) ?>
                        {{ $year }} 
                        {{ $carInformation->make }} 
                        {{ $carInformation->model }} 
                        {{ $carInformation->fuelType }} in 
                        {{ $carInformation->primaryColour }}
                    </h2> 
                   
                    @foreach($carInformation->motTests as $motTest)
                        <div style="
                                background:rgba(0,0,0,0.1); 
                                border-radius: 5px; margin:15px 0; 
                                border:1px rgba(0,0,0,0.2) solid;
                                padding:20px 0">
                            
                            @if ($motTest->testResult === 'PASSED')
                                <h3 style="color:green"> {{ $motTest->testResult }}</h3>
                            @else
                                <h3 style="color:red"> {{ $motTest->testResult }}</h3>
                            @endif                            

                            {{ $motTest->completedDate }}<br>
                            {{ $motTest->odometerValue }} 
                            @if ($motTest->odometerUnit === 'mi')
                                {{ 'miles' }}
                            @else
                                {{ 'kilometers' }}
                            @endif 
                            <h3>Comments:</h3>
                            @foreach($motTest->rfrAndComments as $rfrAndComment)
                                {{ $rfrAndComment->type }}: {{ $rfrAndComment->text }} 
                                @if ($rfrAndComment->dangerous === true) 
                                {{ 'DANGEROUS' }}<br>
                                @else <br>
                                @endif
                            @endforeach
                        </div>
                     @endforeach
<!--                     <?php dd($motTest); ?> -->
                @endforeach

        </div>
    </body>

</html>
