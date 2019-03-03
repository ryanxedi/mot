@extends('layouts.header')
 
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

            <?php
            if(!empty($carInformation->firstUsedDate)) {
              $year = substr($carInformation->firstUsedDate, 0, 4); }
            else {
              header( "Location: not-found" ); die;
            }
            ?>

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
      <span class="text-muted">&copy; <a href="https://checkmyrmot.uk">Check My MOT</a> <?php echo date('Y') ?></span>
    </div>
  </footer>
@extends('layouts.footer')