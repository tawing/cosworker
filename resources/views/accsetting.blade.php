@extends('layouts.layout')
@section('content')

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#0c2559;">

    <div class="d-flex align-items-center justify-content-between">
      <img src="../assets/img/PSA.png" alt="PSA Logo" height="40" width="40" style="
        width: 45px;
        height: 45px;
        display: block;
        position: relative;
        overflow: hidden;
        margin-top: 0px;
        margin-right: 10px;
    ">
      <a href="dashboard.html" class="logo d-flex align-items-center" style="margin: 0px;">
        <span class="app-brand-logo demo">
        
        </span>
        <span class="d-none d-lg-block" style="color: aliceblue; ">COSWorker</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color:aliceblue"></i>
    </div>
    <!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: rgb(255, 255, 255);">Administrator</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Statistical Specialist II</span>
            </li>
           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/accountsettings')}}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/employee') }}">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Employee List</span>
        </a>
      </li><!-- End Employee list -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/projects') }}">
          <i class="bi bi-archive"></i>
          <span>Projects</span>
        </a>
      </li><!-- End Projects -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/deactivated') }}">
          <i class="bi bi-person-x"></i>
          <span>Deactivated</span>
        </a>
      </li><!-- End Deactivated -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/blacklist') }}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Blacklist</span>
        </a>
      </li><!-- End Blacklist -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>LOGS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/certificate_log') }}">
              <i class="bi bi-circle"></i><span>Certificate LOGS</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/blacklist_log') }}">
              <i class="bi bi-circle"></i><span>Blacklist Certificate LOGS</span>
            </a>
          </li>
        </ul>
      </li><!-- End LOGS Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/uploadfile') }}">
          <i class="bi bi-upload"></i>
          <span>Upload File</span>
        </a>
      </li><!-- End Upload File -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/usersandperm') }}">
          <i class="bi bi-shield-lock"></i>
          <span>Users & Permission</span>
        </a>
      </li><!-- End Users & Permission -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Account Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
          <li class="breadcrumb-item active">Account Settings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <!-- Account setting cardboard -->
            <div class="col-md-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <form id="user-form" method="POST" action="{{ route('accountsettings.updates') }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $data->users_id}}"/> 
                    <h5 class="card-title">Account Settings</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="card-title">Profile</h1>
                        </div>      
                        <div class="col-md-9 mt-3">
                            <div class="form-row d-flex">
                                <div class="form-group col-md-6" style="padding-right: 20px;">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control mt-2"  placeholder="FIRST NAME" name="firstname" value="{{$data->firstname}}" required>
                                </div>
                                <div class="form-group col-md-6" style="padding-right: 20px;">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control mt-2"  placeholder="LAST NAME" name="lastname" value="{{$data->lastname}}" required>
                                </div>                                                                
                            </div>
                            <div class="form-row d-flex mt-3">
                                <div class="form-group col-md-6" style="padding-right: 20px;">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control mt-2" placeholder="USERNAME" name="username" value="{{$data->username}}" required>
                                </div>
                                <div class="form-group col-md-6" style="padding-right: 20px;">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control mt-2"  placeholder="EMAIL" name="email" value="{{$data->email}}" required>
                                </div>                                 
                            </div>
                            
                            <button type="submit" class="btn btn-outline-success mt-4 mb-4">Update Profile</button>                                                        
                        </div>                                                                                     
                    </div>
                  </form>
                    <hr>
                    <form method="POST" action="{{ route('profile.update-password') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                <div class="col-md-4" style="padding-bottom: 10px;">
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password">

                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-4" style="padding-bottom: 10px;">
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-4" style="padding-bottom: 10px;">
                                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-success mt-4 mb-4">
                                        {{ __('Update Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>                
                </div>

              
            </div><!-- End Sales Card -->

            

      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <script>
  $(document).ready(function() {
        // Hide the alert div after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>

  @endsection