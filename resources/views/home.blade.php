<x-app>
  <div class="container" style="text-align: center">
    <img src="svg/logo-front.svg" class="logo">
    <div class="input-group my-5">
      <form action="/your-car" method="get">
        <div class="input-group">
          <input type="text" class="form-control numberplate" name="registration" placeholder="Your Reg" aria-describedby="registration" maxlength="7">
          <button class="btn btn-primary" type="submit" id="registration" style="border-radius: 0 7px 7px 0">
            <i class="bi bi-calendar2-check mx-3" style="font-size: 2.5em;"></i><br>
          </button>
        </div>
      </form>
    </div>
    @if (\Session::has('error'))
    <div>
      <center>
        <span style="color:red">
          {!! \Session::get('error') !!}
        </span>
      </center>
    </div>
    @endif
    <h2 style="color:#444">Enter your registration number above to get the full MOT history of your car</h2>
  </div>
</x-app>