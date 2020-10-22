@extends('layouts.header')
 
  <body class="d-flex flex-column h-100">

  <main role="main" class="flex-shrink-0" style="align-items:center;">
    <div class="container" style="text-align: center;">
      <img src="svg/logo-front.svg" class="logo">
        <form method="GET" action="your-car">
              <input autofocus
                  name="registration" 
                  maxlength="7" 
                  id="registration" 
                  class="numberplate" 
                  placeholder="Your Reg"
                  @if (\Session::has('error')) style="border:3px solid red; width:100%" @endif
                  style="width:100%"
                  >
              <br>
              <button class="btn btn-primary" style="margin:60px 0; width:60%;" type="submit">Lets go</button>
              <br> 
              @if (\Session::has('error'))
                  <span style="color:red; text-align:center"> {!! \Session::get('error') !!} </span>
              @endif   
          </form>
          <h3 style="color:#444">Enter your registration number above to get a full MOT history of your car</h3>
    </div>
  </main>

@extends('layouts.footer')