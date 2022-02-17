<x-app>
  <div class="container py-2">
    <div class="mb-3">
      <center>
        <img src="svg/logo-front.svg" class="logo">
      </center>
    </div>
    <form action="/your-car" method="get" class="my-3">
      <div class="input-group mb-3">
        <input type="text" class="form-control numberplate" name="registration" value="{{ $registration }}" aria-describedby="registration" maxlength="7">
        <button class="btn btn-primary" type="submit" id="registration" style="border-radius: 0 7px 7px 0">
          <i class="bi bi-caret-right-fill" style="font-size: 2.5em;"></i><br>
        </button>
      </div>
    </form>

    @if (session('status'))
      <center>
        <h3 style="color:green">
          <i class="bi bi-check-circle-fill my-2" style="font-size:3em"></i>
          <br>{{ session('status') }}
        </h3>
      </center>
    @else
    <form action="/reminder" method="post">
      @csrf
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
               placeholder="Email address" aria-label="Email address" aria-describedby="reminder" 
               style="height:50px; font-size:1.2em">
        <input type="hidden" name="registration" value="{{ $registration }}">
        <input type="hidden" name="expires" value="{{ $expiryDateFormat }}">
        <button class="btn btn-primary" type="submit" id="reminder">
          <i class="bi bi-send-fill mx-1"></i>          
          Remind me 
        </button>
      </div>
    </form>
    @endif
    @if ($errors->first('email'))
      <span style="color:red">{{ $errors->first('email') }}</span>
    @endif

    <h1 style="text-align:center; margin:30px 0; font-weight: bold">
      {{ substr($carsInformation['firstUsedDate'], 0, 4) }} 
      {{ $carsInformation['make'] }} {{ $carsInformation['model'] }} 
      {{ $carsInformation['fuelType'] }} 
      in 
      {{ $carsInformation['primaryColour'] }}
    </h1> 

    @if ( $expired === 0 )
      <div class="result" style="background-color: green">
        <h2 style="color:white; text-transform: uppercase; text-align: center;">
          Your MOT will expire on <span style="font-weight: bold">{{ $expiryDate }}</span>
        </h2>
      </div>
    @else
      <div class="result" style="background-color: red">
        <h2 style="color:white; text-transform: uppercase; text-align: center;">
          Your MOT expired on <span style="font-weight: bold">{{ $expiryDate }}</span>
        </h2>
      </div>
    @endif     

    @foreach($carsInformation['motTests'] as $motTest)
      @php 
        $date = DateTime::createFromFormat('Y.m.d G:i:s', $motTest['completedDate'])->format('F j, Y');
      @endphp
      <div class="result">
        @if ($motTest['testResult'] === 'PASSED')
          <h2 style="color:green; text-transform: uppercase;">
            {{ $motTest['testResult'] }} on {{ $date }}
          </h2>
        @else
          <h2 style="color:red; text-transform: uppercase;">
            {{ $motTest['testResult'] }} on {{ $date }}
          </h2>
        @endif                            
        <h3>{{ number_format($motTest['odometerValue']) }}
          @if ($motTest['odometerUnit'] === 'mi')
              {{ 'miles' }}
          @else
              {{ 'kilometers' }}
          @endif 
        </h3>
        @foreach($motTest['rfrAndComments'] as $rfrAndComment)
          {{ $rfrAndComment['type'] }}: {{ $rfrAndComment['text'] }} 
          @if (isset($rfrAndComment['dangerous'])) 
            DANGEROUS
          @endif
          <br>
        @endforeach
      </div>
    @endforeach
    <footer class="py-3 text-center">
        <span class="text-muted">
          &copy; <a href="https://checkmyrmot.uk">Check My MOT</a> {{ date('Y') }}
        </span>
    </footer>
  </div>
</x-app>
 