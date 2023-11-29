@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
@endphp

@if($user != NULL)
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
               </li>
               <!-- End Search Icon-->
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
                     <!-- <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('/accountsettings')}}">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                        </a>
                     </li> -->
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                        </a>
                     </li>
                  </ul>
                  <!-- End Profile Dropdown Items -->
               </li>
               <!-- End Profile Nav -->
            </ul>
         </nav>
         <!-- End Icons Navigation -->
      </header>
      <!-- End Header -->
      <!-- ======= Sidebar ======= -->
      <aside id="sidebar" class="sidebar">
         <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item active">
               <a class="nav-link " href="{{ url('/home') }}">
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
      <!-- End Sidebar-->
      <main id="main" class="main">
         <div class="pagetitle">
            <h1 style="font-weight: bold;">Philippine Statistics Authority </h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <section class="section dashboard">
            <div class="row">
               <!-- Left side columns -->
               <div class="col-lg-8">
                  <div class="row">
                     <!-- Active Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">Active Employees</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #2eca6a; background-color: #e0f8e9;">
                                    <i class="bi bi-person-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    
                                    <a href="{{url('/list/active')}}">
                                       <h6>{{ $active[0]->count }}</h6>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Inactive Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Inactive Employees</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: rgb(100, 100, 100); background-color: rgb(241, 241, 241);">
                                    <i class="bi bi-person" ></i>
                                 </div>
                                 <div class="ps-3">
                                    <a href="{{url('/list/inactive')}}">
                                       <h6>{{ $inactive[0]->count }}</h6>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Total Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Employees</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #4154f1; background-color: #f6f6fe;">
                                    <i class="bi bi-people"></i>
                                 </div>
                                 <div class="ps-3">
                                    <a href="{{url('/employee')}}">
                                       <h6>{{ $count[0]->count }}</h6>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Certificate Card -->
                     <div class="col-xxl-6 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Certificates Claimed</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: rgb(255, 174, 0); background-color: rgb(255, 244, 218);">
                                    <i class="bi bi-file-earmark-check"></i>
                                 </div>
                                 <div class="ps-3">
                                    <a href="{{url('/total_cert')}}">
                                       <h6>{{ $totalCert }}</h6>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Blacklist Card -->
                     <div class="col-xxl-6 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Blacklist</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #ffe3e8dc; color: #da2958;">
                                    <i class="bi bi-person-x"></i>
                                 </div>
                                 <div class="ps-3">
                                    <a href="{{url('/blacklist_log')}}">
                                       <h6>{{ $blacklist[0]->count }}</h6>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Pending Request -->
                     <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                           <div class="card-body">
                              <h5 class="card-title">Pending Requests</h5>
                              <table class="table table-borderless datatable">
                                 <thead>
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Date & Time</th>
                                       <!-- date format - MM-DD-YYYY | time format - HH:MM (based on 24 hour system) -->
                                       <th scope="col">Request</th>
                                       <th scope="col">User</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Option</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($pendings as $pending)
                                    <tr>
                                       <th>{{ $pending->pending_id }}</th>
                                       <td>{{ $pending->date }}</td>
                                       <td>{{ $pending->request }} <span style="color:rgb(67, 67, 255)"> {{ $pending->e_last.", ".$pending->e_first. " ".$pending->e_middle. " ".$pending->e_ext }}</span></td>
                                       <td>{{ $pending->u_last .", ". $pending->u_first ." ". $pending->u_middle}}</td>
                                       <td>
                                             <span class="
                                                @if($pending->penstatus_id === 1) badge bg-warning 
                                                @elseif($pending->penstatus_id === 2) badge bg-success 
                                                @elseif($pending->penstatus_id === 3) badge bg-danger  @endif">
                                                @if($pending->penstatus_id === 1) Pending
                                                @elseif($pending->penstatus_id === 2) Approved
                                                @elseif($pending->penstatus_id === 3) Rejected @endif
                                             </span>
                                       </td>
                                       <td>
                                             <!-- View only -->
                                             <!-- Button trigger modal -->
                                             <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pending->pending_id }}">
                                                View
                                             </button>
                                             <div class="modal fade" id="exampleModal{{ $pending->pending_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                   <div class="modal-content">
                                                         <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Request for Blacklist</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                            <div class="col-12">
                                                               <h5 class="card-title mb-4" style="padding: 0px;">Employee Profile</h5>
                                                               <form class="forms-sample">
                                                                     <div class="form-row d-flex">
                                                                        <div class="form-group col-md-3" style="padding: 5px;">
                                                                           <label>LAST NAME</label>
                                                                           <input type="text" class="form-control mt-2" value="{{ $pending->e_last }}" placeholder="Lastname" name="last_name" readonly>
                                                                        </div>
                                                                        <div class="form-group col-md-3" style="padding: 5px;">
                                                                           <label>FIRST NAME</label>
                                                                           <input type="text" class="form-control mt-2" value="{{ $pending->e_first }}" placeholder="Firstname" name="first_name" readonly>
                                                                        </div>
                                                                        <div class="form-group col-md-3" style="padding: 5px;">
                                                                           <label>MIDDLE NAME</label>
                                                                           <input type="text" class="form-control mt-2" value="{{ $pending->e_middle }}" placeholder="Middlename" name="middle_name" readonly>
                                                                        </div>
                                                                        <div class="form-group col-md-3" style="padding: 5px;">
                                                                           <label>SUFFIX</label>
                                                                           <input type="text" class="form-control mt-2" placeholder="{{ $pending->e_ext }}" name="suffix" readonly>
                                                                        </div>
                                                                     </div>
                                                                     <hr>
                                                                     <h5 class="card-title mb-4" style="padding: 0px;">Request</h5>
                                                                     <!-- Table with hoverable rows -->
                                                                     <div class="row" style="margin-left: 2px;">
                                                                        <div class="col-md-6" style="margin-top: 0px;">
                                                                           <div class="form-floating">
                                                                                 <input type="text" class="form-control mt-2" value="{{ $pending->training ? $pending->training : '' }}" placeholder="Training" name="training" readonly>
                                                                                 <label for="floatingTraining">Training</label>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                           <div class="form-floating">
                                                                                 <input type="text" class="form-control" placeholder="Place of Assignment" name="mandays" value="{{ isset($pending->mandays) ? $pending->mandays : '' }}" readonly>
                                                                                 <label for="floatingMandays">Mandays</label>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="row" style="margin-top:15px; margin-left: 2px;">
                                                                        <div class="col-md-3">
                                                                           <div class="form-floating mb-3">
                                                                                 <input type="date" class="form-control" placeholder="Start Date" name="startdate1" value="{{ isset($pending->startdate1) ? $pending->startdate1 : '' }}" readonly>
                                                                                 <label for="floatingStartdate">Start Date</label>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                           <div class="form-floating">
                                                                                 <input type="date" class="form-control" placeholder="End Date" name="enddate1" value="{{ isset($pending->enddate1) ? $pending->enddate1 : '' }}" readonly>
                                                                                 <label for="floatingEnddate">End Date</label>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                           <div class="form-floating mb-3">
                                                                                 <input type="date" class="form-control" placeholder="Start Date" name="startdate2" value="{{ isset($pending->startdate2) ? $pending->startdate2 : '' }}" readonly>
                                                                                 <label for="floatingStartdate">Start Date</label>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                           <div class="form-floating">
                                                                                 <input type="date" class="form-control" placeholder="End Date" name="enddate2" value="{{ isset($pending->enddate2) ? $pending->enddate2 : '' }}" readonly>
                                                                                 <label for="floatingEnddate">End Date</label>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                               </form>
                                                            </div>
                                                            <!-- End Recent Sales -->
                                                         </div>
                                                         <div class="modal-footer">
                                                            
                                                            <form class="forms-sample" action="{{ route('processRequest', ['id' => $pending->pending_id, 'employee_id' => $pending->employee_id]) }}" method="POST">
                                                            @csrf
                                                               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                               @if($pending->penstatus_id == 1)
                                                                  <button type="submit" name="action" value="reject" class="btn btn-outline-danger">Reject</button>
                                                                  <button type="submit" name="action" value="approve" class="btn btn-outline-success">Approve</button>
                                                               @endif
                                                            </form>
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                       </td>
                                    </tr>
                                 @endforeach

                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- End Blacklist Approval -->
                     <!-- <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <h5 class="card-title">Certificate Printed Chart</h5>
                              
                              <canvas id="barChart" style="max-height: 400px;"></canvas>
                              <script>
                                 document.addEventListener("DOMContentLoaded", () => {
                                   new Chart(document.querySelector('#barChart'), {
                                     type: 'bar',
                                     data: {
                                       labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                       datasets: [{
                                         label: '# of Certificates claimed',
                                         data: [65, 59, 80, 81, 56, 55, 40],
                                         backgroundColor: [
                                           'rgba(255, 99, 132, 0.2)',
                                           'rgba(255, 159, 64, 0.2)',
                                           'rgba(255, 205, 86, 0.2)',
                                           'rgba(75, 192, 192, 0.2)',
                                           'rgba(54, 162, 235, 0.2)',
                                           'rgba(153, 102, 255, 0.2)',
                                           'rgba(201, 203, 207, 0.2)'
                                         ],
                                         borderColor: [
                                           'rgb(255, 99, 132)',
                                           'rgb(255, 159, 64)',
                                           'rgb(255, 205, 86)',
                                           'rgb(75, 192, 192)',
                                           'rgb(54, 162, 235)',
                                           'rgb(153, 102, 255)',
                                           'rgb(201, 203, 207)'
                                         ],
                                         borderWidth: 1
                                       }]
                                     },
                                     options: {
                                       scales: {
                                         y: {
                                           beginAtZero: true
                                         }
                                       }
                                     }
                                   });
                                 });
                              </script>
                           
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
               <!-- End Left side columns -->
               <!-- Right side columns -->
               <div class="col-lg-4">
                  <!-- Recent Activity -->
                  <div class="card" style="height: 700px;">
                     <div class="filter">
                         <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                             <li class="dropdown-header text-start">
                                 <h6>Filter</h6>
                             </li>
                             <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                             <li><a class="dropdown-item" href="#" data-filter="this_month">This Month</a></li>
                             <li><a class="dropdown-item" href="#" data-filter="this_year">This Year</a></li>
                         </ul>
                     </div>
                 
                     <div class="card-body">
                         <h5 class="card-title">Recent Activity <span>| </span></h5>
                         <div class="activity" style="overflow:scroll; height: 620px;">
                             @foreach($recents as $key => $data)
                             <div class="activity-item d-flex">
                                 
                                 <div class="activite-label">{{ $elapsed[$key] }}</div>
                                 <i class='bi bi-circle-fill activity-badge 
                                    @if($data->recstats_id === 1) text-info
												@elseif($data->recstats_id === 2) text-warning 
												@elseif($data->recstats_id === 3) text-primary  
                                    @elseif($data->recstats_id === 4) text-success 
                                    @elseif($data->recstats_id === 5) text-danger 
                                    @elseif($data->recstats_id === 6) text-success
                                    @elseif($data->recstats_id === 7) text-warning @endif">
												 align-self-start'></i>
                                 <div class="activity-content">
                                     Admin_{{ $data->u_last }} <a href="#" class="fw-bold text-dark">{{ $data->action }} </a> {{ $data->e_last.", ".$data->e_first. " ".$data->e_mid }}
                                 </div>
                             </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
                  <!-- End Recent Activity -->
               </div>
               <!-- End Right side columns -->
            </div>
         </section>
      </main>
      <!-- End #main -->
      <div class="scrollbar" id="style-14">
         <div class="force-overflow"></div>
      </div>
      <style>
         #style-14::-webkit-scrollbar-track
         {
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.6);
         background-color: #CCCCCC;
         }
         #style-14::-webkit-scrollbar
         {
         width: 10px;
         background-color: #F5F5F5;
         }
         #style-14::-webkit-scrollbar-thumb
         {
         background-color: #FFF;
         background-image: -webkit-linear-gradient(90deg,
         rgba(0, 0, 0, 1) 0%,
         rgba(0, 0, 0, 1) 25%,
         transparent 100%,
         rgba(0, 0, 0, 1) 75%,
         transparent)
         }
      </style>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      
@endsection
@else
@endif

