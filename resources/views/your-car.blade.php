<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Check My MOT</title>
 
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
 
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
 
      @media (min-width: 768px) {
      .bd-placeholder-img-lg {font-size: 3.5rem;}
      .numberplate {font-size: 8em;}
      }

      main > .container {
        padding: 60px 15px 0;
      }

      .footer {
        background-color: #f5f5f5;
      }

      .footer > .container {
        padding-right: 15px;
        padding-left: 15px;
      }

      code {
        font-size: 80%;
      }
    </style>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(function() {
                $('#registration').on('keypress', function(e) {
                    if (e.which == 32)
                        return false;
                });
            });
        </script>
  </head>
 
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="svg/logo.svg" width="250"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
 
          <div class="collapse navbar-collapse mr-auto" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="POST" action="/your-car">
              @csrf
              <input 
                style="text-transform: uppercase; font-family:UKNumberPlate; 
                background:yellow" 
                class="form-control mr-sm-2" 
                id="registration" 
                name="registration" 
                maxlength="7" 
                placeholder="YOUR REG" 
                aria-label="Search" 
                autofocus>
              <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Lets Go</button>
            </form>
          </div>
        </div>
      </nav>
    </header>
  <main role="main" class="flex-shrink-0">
    <div class="container">
      @foreach($carsInformation as $carInformation)
        <div class="numberplate">
            {{ $carInformation->registration }}
        </div>
        <h2 style="text-align:center; margin:30px 0; font-weight: bold">
            <?php $year = substr($carInformation->firstUsedDate, 0, 4) ?>
            {{ $year }} 
            {{ $carInformation->make }} 
            {{ $carInformation->model }} 
            {{ $carInformation->fuelType }} in 
            {{ $carInformation->primaryColour }}
        </h2> 
       
        @foreach($carInformation->motTests as $motTest)
            <?php $date = DateTime::createFromFormat('Y.m.d G:i:s', $motTest->completedDate)->format('F j, Y'); ?>
            <div class="result">
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
    </div>
  </main>
 
  <footer class="footer mt-auto py-3">
    <div class="container">
      <span class="text-muted">&copy; 2019 - Check Your MOT</span>
    </div>
  </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>