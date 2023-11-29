@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
@endphp

@if($user != NULL)

@extends('layouts.layout')
@section('content')
  <style>
    thead input {
        width: 100%;
    }

    #example_filter label{
        display: none;
    }
    .parent {
        overflow: hidden;
        position: relative;
        width: 100%;
    }
    .child-right {
        height: 100%;
        width: 100%;
        position: relative;
        right: 0;
        top: 0;
    }
  </style>
</head>
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
       </li>
       <!-- End Dashboard Nav -->
       <li class="nav-item">
          <a class="nav-link active" href="{{ url('/employee') }}">
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

  <main id="main" class="main">

    <div class="pagetitle">
        <h1 style="font-weight: bold;">Philippine Statistics Authority</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
          <li class="breadcrumb-item active">Employee List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!--DRE MO PAG DESIGN-->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
            <div class="row">

            @if (session()->has('error'))
              <div class="alert alert-danger" role="alert">{{ session()->get('error') }}</div>
            @endif

            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body parent" >
                  <h5 class="card-title">Employee List</h5>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-square" style="padding-right: 5px;"></i>
                    Add
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="col-12">
                                <h5 class="card-title mb-4" style="padding: 0px;">Employee Profile</h5>
              
                                <form class="forms-sample" id="modal-form"  action="{{ route('employee.add') }}" method="POST">
                                  @csrf
                                  <div class="row g-3">
                                    <div class="col-md-3">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-2" id="floatingName" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
                                        <label for="floatingName">Last Name</label>
                                        @error('lastname')
                                        <div class="alert alert-danger" role="alert">
                                          INPUT REQUIRED: A-Z
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-2" id="floatingName" name="firstname" placeholder="First Name" value="{{ old('firstname') }}">
                                        <label for="floatingName">First Name</label>
                                        @error('firstname')
                                        <div class="alert alert-danger" role="alert">
                                          INPUT REQUIRED: A-Z
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-2" id="floatingName" name="middlename" placeholder="Middle Name" value="{{ old('middlename') }}">
                                        <label for="floatingName">Middle Name</label>
                                        @error('middlename')
                                        <div class="alert alert-danger" role="alert">
                                          INPUT REQUIRED: A-Z
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-2" id="floatingName" name="ressufix" placeholder="Suffix" value="{{ old('ressufix') }}">
                                        <label for="floatingName">Suffix</label>
                                      </div>
                                    </div>
                                  </div>
              
                                  <div class="row g-3">
                                    <div class="col-md-6">
                                      <div class="form-floating mt-3">
                                        <select class="form-select" id="floatingSelect" aria-label="State" name="educ" required>
                                          <option value="">--SELECT--</option>
                                          @foreach ($educattains as $educattain)
                                          <option value="{{ $educattain->educ_name }}" {{ old('educ') == $educattain->educ_name ? 'selected' : '' }}>{{ $educattain->educ_name }}</option>
                                          @endforeach
                                        </select>
                                        <label for="floatingSelect">Educational Attainment</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingName" placeholder="Eligibility" name="eligibility" value="{{ old('eligibility') }}">
                                        <label for="floatingName">Eligibility</label>
                                      </div>
                                    </div>
                                  </div>
              
                                  <div class="row g-3">
                                    <div class="col-md-2">
                                      <div class="form-floating">
                                        <input type="date" class="form-control mt-3" id="floatingName" placeholder="Birthday" name="bday" value="{{ old('bday') }}" required>
                                        <label for="floatingName">Birthday</label>
                                        @error('bday')
                                        <div class="alert alert-danger" role="alert">
                                          DATE ERROR: BIRTHDATE IS FROM THE FUTURE
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingName" placeholder="Sex" name="sex" value="{{ old('sex') }}" required>
                                        <label for="floatingName">Sex</label>
                                      </div>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingName" placeholder="Addresss" name="address" value="{{ old('address') }}" required>
                                        <label for="floatingName">Address</label>
                                      </div>
                                    </div>
                                  </div>
              
                                  <div class="row g-3">
                                    <div class="col-md-4">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingName" placeholder="Contact Number" name="number" value="{{ old('number') }}">
                                        <label for="floatingName">Contact Number</label>
                                        @error('number')
                                        <div class="alert alert-danger" role="alert">
                                          INPUT REQUIRED: 11 digits
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-floating">
                                        <input type="email" class="form-control mt-3" id="floatingEmail" placeholder="Email" name="email" value="{{ old('email') }}">
                                        <label for="floatingName">Email</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingName" placeholder="Marital Status" name="mstatus" value="{{ old('mstatus') }}">
                                        <label for="floatingName">Marital Status</label>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row g-3">
                                    <div class="col-md-6">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingName" placeholder="Tin Number" name="tin" value="{{ old('tin') }}">
                                        <label for="floatingName">Tin No.</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-floating">
                                        <input type="text" class="form-control mt-3" id="floatingEmail" placeholder="Agency Employee Number" name="agencyempno" value="{{ old('agencyempno') }}">
                                        <label for="floatingName">Agency Employee No.</label>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" id="submit-form">Add</button>
                                </form>
                          </div>


                        </div><!--/modal body-->
                        
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <a href="{{ url('/generate-pdf')}}"><button type="button" class="btn btn-outline-info mb-4"><i class="bi bi-printer" style="padding-right: 5px;"></i>Print</button></a>
                  <a href="{{ url('/allemployee-pdf')}}" ><button type="button" title="Generate all employee's profile individually in a single pdf file." class="btn btn-outline-info mb-4"><i class="bi bi-printer" style="padding-right: 5px;"></i>Generate All Profile</button></a>

                  <table class="table table-borderless datatable child-right" id="example" style="width: 100%;">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Educational Attainment</th>
                        <th scope="col">Eligibility</th>
                        <th scope="col">Option</th>           
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($employees as $employee)
                      <tr>
                        <th scope="row"><a href="#">{{$employee->employee_id}}</a></th>
                        <td>{{$employee->lastname}}</td>
                        <td>{{$employee->firstname}}</td>
                        <td>{{$employee->middlename}}</td>
                        <td>{{$employee->name_ext}}</td>
                        <td>{{$employee->gender}}</td>
                        <td>{{$employee->educ_name}}</td>
                        <td>{{$employee->eligibility}}</td>
                          <!-- Button trigger modal -->
                          <td>
                          <a href="{{ route('employee.profile', ['id' => $employee->employee_id]) }}">
                            <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" >
                              View
                            </button>
                          </a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                    
                  </table>
                </div>

              </div>
            </div><!-- End Recent Sales -->
            </div>
        </div>
      </div>
    </section>

    <!--/DRE MO PAG DESIGN-->
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection

@else
	<main>
		<div class="container">

		<section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
			<h2>You must log in to continue</h2>
			<a class="btn" href="{{ url('/') }}">Back to Login</a>
			<img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
			<div class="credits">
			</div>
		</section>

		</div>
	</main><!-- End #main -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 @endif
 