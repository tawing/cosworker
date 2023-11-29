@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
@endphp


@if(isset($user) != NULL)
  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>You are already logged in. </h2>
        <a class="btn" href="{{ url('/home') }}">Back to Home</a>
        <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@else

@extends('layouts.layout')
  @section('content')
    <style>
        footer#footer.footer{
            display: none;
        }

        body {
        /* background-image: url('../assets/img/PSA_back.png');
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%; */
        }

    </style>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" >

                <div class="card mb-3" >
                  <div class="card-body">
                    <div class="app-brand justify-content-center" style="margin-top: 30px;">
                  
                      <span class="app-brand-logo demo">
                        <img src="../assets/img/PSA.png" width="80" height="70" style="margin-bottom: 20px; margin-left: 20px;">
                          
                      </span>
                      <span  style="color: black; margin-left: 5px; font-size: 38px;">COSWORKER</span>

                      <p class="text-center large">  Tracking System for Contract of Service Workers (COSWs)</p>
                    </div>
                    
                    <form class="row g-3 needs-validation"  method="POST" action="{{ route('logins.perform') }}">
                      @csrf

                      @error('username')
                      <div class="alert alert-danger" role="alert">
                        Wrong Credentials!
                      </div>
                      @enderror


                      <div class="col-12">


                        <label for="yourUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                        
                          <input type="text" name="username" class="form-control" id="yourUsername" required>
                          <div class="invalid-feedback">Please enter your username.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" style="background-color:  #0c2559;">Login</button>
                      </div>
                      
                    </form>

                  </div>
                </div>

                <div class="credits" style="text-align:center;">
                  Developed by: <span style="color: blue;">PSA - Misamis Oriental USTP On-the-Job Trainees </span>
                </div>

              </div>
            </div>
          </div>
          
        </section>

    <script>
      const previousUrl = document.referrer;
      console.log(previousUrl);

      // Replace the current URL with the URL of the homepage
      history.pushState({}, '', '/');
    </script>

    <!-- Vendor JS Files -->
    
    @endsection
@endif