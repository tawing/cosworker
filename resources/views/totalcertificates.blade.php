@extends('layouts.layout')
@section('content')
  <!-- ======= Header ======= --> 

  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#0c2559;">

    <div class="d-flex align-items-center justify-content-between">
      <img src="../assets/img/PSA.png" class="PSAimage" alt="PSA Logo">
      <a href="dashboard.html" class="logo d-flex align-items-center" style="margin: 0px;">
      <span class="app-brand-logo demo">
      </span>
      <span class="COSWorker">COSWorker</span>
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
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: rgb(255, 255, 255);">
                     @if($user->usertype_id === 1)
                        Administrator
                     @else
                        System Administrator
                     @endif</span>
                  </a><!-- End Profile Iamge Icon -->
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                        <h6>{{ $user->firstname." ".$user->lastname }}</h6>
                        <span>{{ $user->position_name }}</span>
                     </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="accsetting.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.html">
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
       <li class="nav-item active">
          <a class="nav-link collapsed " href="{{ url('/home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
          </a>
       </li>
       <!-- End Dashboard Nav -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/employee') }}">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Employee List</span>
          </a>
       </li>
       <!-- End Employee list -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/projects') }}">
          <i class="bi bi-archive"></i>
          <span>Projects</span>
          </a>
       </li>
       <!-- End Projects -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/deactivated') }}">
          <i class="bi bi-person-x"></i>
          <span>Deactivated</span>
          </a>
       </li>
       <!-- End Deactivated -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/blacklist') }}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Blacklist</span>
          </a>
       </li>
       <!-- End Blacklist -->
       <li class="nav-item">
          <a class="nav-link active" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
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
       </li>
       <!-- End Tables Nav -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/uploadfile') }}">
          <i class="bi bi-upload"></i>
          <span>Upload File</span>
          </a>
       </li>
       <!-- End Upload File -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/usersandperm') }}">
          <i class="bi bi-shield-lock"></i>
          <span>Users & Permission</span>
          </a>
       </li>
       <!-- End Users & Permission -->
    </ul>
 </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 style="font-weight: bold;">Philippine Statistics Authority</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
          <li class="breadcrumb-item active">All Certificate Logs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!--DRE MO PAG DESIGN-->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Certificate Logs</h5>

        <!-- Default Table -->
        <table class="table">
          <table class="table table-borderless datatable display" id="example">
          <thead>
            <tr>
              <th scope="col">Transaction #</th>
              <th scope="col">Date</th>
              <th scope="col">Issuer</th>
              <th scope="col">Recipient</th>
              <th scope="col">Options</th>

            </tr>
          </thead>
          <tbody>
            @foreach($total_cert as $log)
            <tr @if($log->blacklist == 1)
              @endif>
              <th>{{ $log->Transaction_id }}</th>
              <td>{{ $log->date }}</td>
              <td>{{ $log->userlname.", ".$log->userfname." ".$log->usermname }}</td>
              <td>{{ $log->emlname.", ".$log->emfname." ".$log->emmname }}</td>
              <td style="text-align: center;"><button type="button" class="btn btn-outline-info"  data-bs-target="#modalprint" data-bs-toggle="modal">View</button> 

                <!-- Modal -->
              <div class="modal fade" id="modalprint" tabindex="-1" aria-labelledby="modalprintLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalprintLabel">Certificate of Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="height: 730px;">
                                                  
                      <img src="../assets/img/certificate.png" alt="">
                       

                     </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Default Table Example -->
      </div>
    </div>
    <!--/DRE MO PAG DESIGN-->
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection