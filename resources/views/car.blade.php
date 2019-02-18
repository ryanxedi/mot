<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOT App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

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

    </head>
    <body>


        <div style="padding:60px 0" class="flex-center">
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
                @endforeach
        </div>
    </body>

</html>
