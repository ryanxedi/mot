<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>Check My MOT</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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
                        <?php $date = DateTime::createFromFormat('Y.m.d G:i:s', $motTest->completedDate)->format('F j, Y'); ?>
                        <div class="fade">
                            @if ($motTest->testResult === 'PASSED')
                                <h2 style="color:green; text-transform: uppercase;"> {{ $motTest->testResult }} on {{ $date }}</h2>
                            @else
                                <h2 style="color:red; text-transform: uppercase;"> {{ $motTest->testResult }} on {{ $date }}</h2>
                            @endif                            

                            <h3>{{ $motTest->odometerValue }}
                            @if ($motTest->odometerUnit === 'mi')
                                {{ 'miles' }}</h3> 
                            @else
                                {{ 'kilometers' }}</h3> 
                            @endif 

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
                <a href="/">Start again</a>
            </div>
        </div>
    </body>
</html>
