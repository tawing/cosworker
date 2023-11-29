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
<body>
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
			<li class="nav-item ">
				<a class="nav-link collapsed" href="{{ url('/home') }}">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
				</a>
			</li>
			<!-- End Dashboard Nav -->
			<li class="nav-item active">
				<a class="nav-link " href="{{ url('/employee') }}">
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
					<li class="breadcrumb-item"><a href="Employee.html">Employee List</a></li>
					<li class="breadcrumb-item active">Employee Profile</li>
				</ol>
			</nav>
		</div>
		<!-- End Page Title -->
		<!--DRE MO PAG DESIGN-->
		<section class="section dashboard">
			<div class="row">
				@if (session()->has('status'))
				<div class="alert alert-success" role="alert">{{ session()->get('status') }}</div>
				@endif
				@foreach($employees as $employee)
					@if($employee->deactivate == 1)
						<div class="alert alert-danger" role="alert">ALERT: THIS EMPLOYEE IS CURRENTLY DEACTIVATED</div>
					@endif
				@endforeach
				<div class="col-lg-9">
					<div class="row">
						<div class="col-12">
							<div class="card recent-sales overflow-auto">
								<div class="card-body parent" >
									<h5 class="card-title">Employee Profile</h5>
									<form class="forms-sample">
										@foreach($employees as $employee)
										<div class="form-row d-flex">
											<div class="form-group col-md-3" style="padding: 5px;">
												<label>LAST NAME</label>
												<input type="text" class="form-control mt-2" placeholder="Lastname" name="last_name" value="{{$employee->lastname}}" readonly>
											</div>
											<div class="form-group col-md-3" style="padding: 5px;">
												<label>FIRST NAME</label>
												<input type="text" class="form-control mt-2" placeholder="Firstname" name="first_name" value="{{$employee->firstname}}" readonly>
											</div>
											<div class="form-group col-md-3" style="padding: 5px;">
												<label>MIDDLE NAME</label>
												<input type="text" class="form-control mt-2" placeholder="Middlename" name="middle_name" value="{{$employee->middlename}}" readonly>
											</div>
											<div class="form-group col-md-3" style="padding: 5px;">
												<label>SUFFIX</label>
												<input type="text" class="form-control mt-2" placeholder="Suffix" name="suffix" value="{{$employee->name_ext}}" readonly>
											</div>
										</div>
										<div class="form-row d-flex mt-2">
											<div class="form-group col-md-6" style="padding: 5px;">
												<label>EDUCATIONAL ATTAINMENT</label>
												<div class="col-sm-12">
													<input type="text" class="form-select mt-2" placeholder="HIGHEST COMPLETED EDUCATIONAL ATTAINMENT" name="educattainment" value="{{ $employee->educ_name }}" readonly>
												</div>
											</div>
											<div class="form-group col-md-6" style="padding: 5px;">
												<label>ELIGIBILITY</label>
												<input type="text" class="form-control mt-2" placeholder="Eligibility" name="eligibility" value="{{ $employee->eligibility }}" readonly>
											</div>
										</div>
										<div class="form-row d-flex mt-2">
											<div class="form-group col-md-2" style="padding: 5px;">
												<label>BIRTHDAY</label>
												<input type="date" class="form-control mt-2" placeholder="Birthday" name="birthday" value="{{ $employee->birthdate }}" disabled>
											</div>
											<div class="form-group col-md-2" style="padding: 5px;">
												<label>SEX</label>
												<input type="text" class="form-control mt-2" placeholder="Sex" name="sex" value="{{ $employee->gender }}" readonly>
											</div>
											<div class="form-group col-md-8" style="padding: 5px;">
												<label>ADDRESS</label>
												<input type="text" class="form-control mt-2" placeholder="Address" name="address" value="{{ $employee->address }}"readonly>
											</div>
										</div>
										<div class="form-row d-flex mt-2">
											<div class="form-group col-md-4" style="padding: 5px;">
												<label>CONTACT NUMBER</label>
												<input type="text" class="form-control mt-2" placeholder="Contact Number" name="contact" value="{{ $employee->contact_no }}"readonly>
											</div>
											<div class="form-group col-md-4" style="padding: 5px;">
												<label>EMAIL</label>
												<input type="email" class="form-control mt-2" placeholder="Email" name="email" value="{{ $employee->email }}" readonly>
											</div>
											<div class="form-group col-md-4" style="padding: 5px;">
												<label>MARITAL STATUS</label>
												<input type="text" class="form-control mt-2" placeholder="Marital Status" name="marital_status" value="{{ $employee->marital_status }}" readonly>
											</div>
										</div>
										<div class="form-row d-flex mt-2">
											<div class="form-group col-md-6" style="padding: 5px;">
												<label>TIN NUMBER.</label>
												<input type="text" class="form-control mt-2" placeholder="Tin No." name="contact" value="{{$employee->tin_no}}" readonly>
											</div>
											<div class="form-group col-md-6" style="padding: 5px;">
												<label>AGENCY EMPLOYEE NUMBER</label>
												<input type="text" class="form-control mt-2" placeholder="Agency Employee Number" name="email" value="{{$employee->agencyemp_no}}" readonly>
											</div>
										</div>
										<div class="form-row d-flex mt-2">
											<div class="form-group col-md-12" style="padding: 5px;">
												<label>REMARKS</label>
												<div class="col-sm-12">
													<textarea class="form-control mt-2" style="height: 100px" readonly></textarea>
												</div>
											</div>
										</div>
										@endforeach
									</form>
								</div>
							</div>
						</div>
						<!-- End Recent Sales -->
					</div>
				</div>
				<!-- END of col-8 -->
				<div class="col-lg-3">
					<div class="card">
						<div class="card-body" style="height: 460px;">
							<h5 class="card-title">Actions</h5>
							<button title="After editing the employee's profiling form, press the button below to save the changes made." type="button" class="col-sm-12 btn btn-outline-primary rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
							UPDATE PROFILE
							</button>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Update Employee Profile</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="col-12">
												<!-- <div class="card recent-sales overflow-auto"> -->
												<!-- <div class="card-body parent" > -->
												<h5 class="card-title mb-4" style="padding: 0px;">Employee Profile</h5>
												<form class="forms-sample" action="{{ route('employee.update') }}" method="POST">
													@csrf
													@foreach($employees as $data)
													<input type="text" name="empid" value="{{$empid}}" hidden>
													<div class="row g-3">
														<div class="col-md-3">
															<div class="form-floating">
																<input type="text" class="form-control mt-2" id="floatingName" name="lastname" placeholder="Last Name" value="{{ $data->lastname }}">
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
																<input type="text" class="form-control mt-2" id="floatingName" name="firstname" placeholder="First Name" value="{{ $data->firstname }}">
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
																<input type="text" class="form-control mt-2" id="floatingName" name="middlename" placeholder="Middle Name" value="{{ $data->middlename }}">
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
																<input type="text" class="form-control mt-2" id="floatingName" name="ressuffix" placeholder="Suffix" @if(isset($data->name_ext))value="{{ $data->name_ext }}"@endif>
																<label for="floatingName">Suffix</label>
																@error('ressuffix')
																<div class="alert alert-danger" role="alert">
																	INPUT REQUIRED: A-Z
																</div>
																@enderror
															</div>
														</div>
													</div>
													<div class="row g-3">
														<div class="col-md-6">
															<div class="form-floating mt-3">
																<select class="form-select" id="floatingSelect" name="educ" aria-label="State">
																	@foreach($choseneduc as $chosen)
																	<option selected>{{ $chosen->educ_name }}</option>
																	@endforeach
																	@foreach($educations as $education)
																	<option>{{ $education->educ_name}}</option>
																	@endforeach
																</select>
																<label for="floatingSelect">Educational Attainment</label>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-floating">
																<input type="text" class="form-control mt-3" id="floatingName" name="eligibility" placeholder="Eligibility" value="{{ $data->eligibility }}">
																<label for="floatingName">Eligibility</label>
															</div>
														</div>
													</div>
													<div class="row g-3">
														<div class="col-md-2">
															<div class="form-floating">
																<input type="date" class="form-control mt-3" id="floatingName" name="bday" placeholder="Birthday" value="{{ $data->birthdate }}">
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
																<input type="text" class="form-control mt-3" id="floatingName" name="sex" placeholder="Sex" value="{{ $data->gender }}">
																<label for="floatingName">Sex</label>
															</div>
														</div>
														<div class="col-md-8">
															<div class="form-floating">
																<input type="text" class="form-control mt-3" id="floatingName" name="address" placeholder="Addresss" value="{{ $data->address }}">
																<label for="floatingName">Address</label>
															</div>
														</div>
													</div>
													<div class="row g-3">
														<div class="col-md-4">
															<div class="form-floating">
																<input type="text" class="form-control mt-3" id="floatingName" name="contactno" placeholder="Contact Number" value="{{ $data->contact_no }}">
																<label for="floatingName">Contact Number</label>
																@error('contactno')
																<div class="alert alert-danger" role="alert">
																	INPUT REQUIRED: 11-DIGIT NUMBER
																</div>
																@enderror
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-floating">
																<input type="email" class="form-control mt-3" id="floatingEmail" name="email" placeholder="Email" value="{{ $data->email }}">
																<label for="floatingName">Email</label>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-floating">
																<input type="text" class="form-control mt-3" id="floatingName" name="mstatus" placeholder="Marital Status" value="{{ $data->marital_status }}">
																<label for="floatingName">Marital Status</label>
															</div>
														</div>
													</div>
													<div class="row g-3">
														<div class="col-md-6">
															<div class="form-floating">
																<input type="text" class="form-control mt-3" id="floatingName" name="tinno" placeholder="Tin Number">
																<label for="floatingName">Tin No.</label>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-floating">
																<input type="text" class="form-control mt-3" id="floatingEmail" name="agencyempno" placeholder="Agency Employee Number">
																<label for="floatingName">Agency Employee No.</label>
															</div>
														</div>
													</div>
													@endforeach
													<!-- </div> -->
													<!-- </div> -->
											</div>
											<!-- End Recent Sales -->
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-outline-success">Update Profile</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<label class="mt-3">Print a hardcopy of the employee's profile form.</label>
							<a href="{{ url('/employee-pdf/'.$employee_id) }}" ><button type="button" class="col-sm-12 btn btn-outline-info rounded-pill mt-3">PRINT EMPLOYEE PROFILE FORM</button></a>
							<a href="{{ url('/employee-clearance/'.$employee_id) }}" ><button type="button" class="col-sm-12 btn btn-outline-info rounded-pill mt-3">PRINT CLEARANCE FORM</button></a>
							@if($employees[0]->deactivate == 1)
							<!-- Palihog lang ko change sa sentence if unsay much better ani. -->
							<label class="mt-3">This employee is deactivated. You can activate this user by clicking the activate button.</label>
							<button type="button" class="col-sm-12 btn btn-outline-success rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#activateModal">ACTIVATE</button>
							@else
							<label class="mt-3">You can only deactivate an employee if he/she is retired or passed away.</label>
							<button type="button" class="col-sm-12 btn btn-outline-danger rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#deactivateModal">DEACTIVATE</button>
							@endif
							<!-- Modal For Activation-->
							<div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="deativateModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-s">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="activateModalLabel" style="color: green;">Activation</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Floating Labels Form -->
											<form class="row g-3">
												<div class="col-md-12">
													<h5 class="modal-title" style="text-align: center;">Are you sure you want to <span style="color: green; ">activate </span>{{ $employees[0]->lastname }}, {{$employees[0]->firstname}}?</h5>
												</div>
											</form>
											<!-- End floating Labels Form -->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#yesActivateModal">Yes</button>
										</div>
									</div>
								</div>
							</div>
						
							<!--/End modal-->
							<!-- Modal For Activation Confirmation-->
							<div class="modal fade" id="yesActivateModal" tabindex="-1" aria-labelledby="finalModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-s">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="finalModalLabel" style="color: green;">Activation</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Floating Labels Form -->
											<form class="row g-3" action="{{ route('employee.activate') }}" method="POST">
												@csrf
												<div class="col-md-12">
													<h5 class="modal-title" style="text-align: center;">Please enter your password to verify:</h5>
												</div>
												<div class="col-md-12">
													<div class="col-md-12">
														<div class="form-floating">
															<input type="text" name="empid" value="{{$empid}}" hidden>
															<input type="password" class="form-control" id="floatingCity" name="password" placeholder="Password">
															<label for="floatingCity">Password</label>
														</div>
													</div>
												</div>
												<!-- End floating Labels Form -->
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#finalModal">Activate</button>
										</div>
										</form>
									</div>
								</div>
							</div>
						
							<!--/End modal-->
							<!-- Modal For Deactivation-->
							<div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deativateModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-s">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deactivateModalLabel" style="color: red;">Deactivation</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Floating Labels Form -->
											<form class="row g-3">
												<div class="col-md-12">
													<h5 class="modal-title" style="text-align: center;">Are you sure you want to <span style="color: red;">deactivate </span>{{ $employees[0]->lastname }}, {{$employees[0]->firstname}}?</h5>
												</div>
											</form>
											<!-- End floating Labels Form -->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#yesModal">Yes</button>
										</div>
									</div>
								</div>
							</div>
							<!--/End modal-->
							<!-- Modal For Deactivation Confirmation-->
							<div class="modal fade" id="yesModal" tabindex="-1" aria-labelledby="finalModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-s">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="finalModalLabel" style="color: red;">Deactivation</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Floating Labels Form -->
											<form class="row g-3" action="{{ route('employee.deactivate') }}" method="POST">
												@csrf
												<div class="col-md-12">
													<h5 class="modal-title" style="text-align: center;">Please enter your password to verify:</h5>
												</div>
												<div class="col-md-12">
													<div class="col-md-12">
														<div class="form-floating">
															<input type="text" name="empid" value="{{$empid}}" hidden>
															<input type="password" class="form-control" id="floatingCity" name="password" placeholder="Password">
															<label for="floatingCity">Password</label>
														</div>
													</div>
												</div>
												<!-- End floating Labels Form -->
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-outline-danger"data-bs-toggle="modal" data-bs-target="#finalModal">Deactivate</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<!--/End modal-->
							<!--Deactivate Button-->          
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Projects</h5>
							<button type="button" class="btn btn-outline-primary mb-3" style="padding: 6px 15px 6px;" data-bs-toggle="modal" data-bs-target="#addprojects">Add</button>
							<button type="button" class="btn btn-outline-info mb-3" style="padding: 6px 15px 6px;" data-bs-toggle="modal" data-bs-target="#viewall">View All</button>
							<!-- Modal -->
							<div class="modal fade" id="viewall" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ModalLabel">All projects</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body overflow-auto">
											<img src="../assets/img/view_all.png" alt="">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="addprojects" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ModalLabel">Add Project</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Floating Labels Form FOR ADDING PROJECT -->
											<form class="row g-3" action="{{ route('employee.addproject') }}" method="POST">
												@csrf
												<input type="text" name="empid" value="{{$empid}}" hidden>
												<div class="col-md-12">
													<div class="form-floating">
														<select class="form-select" id="projectNameSelect" name="projectname" aria-label="Project Name" required>
															<option value="">--SELECT--</option>
															@foreach($projectlist as $project)
															<option value="{{ $project->projectname }}">{{ $project->projectname }}</option>
															@endforeach
														</select>
														<label for="projectNameSelect">Project Name</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-floating mb-3">
														<select class="form-select" id="positionSelect" name="position" aria-label="Position" required>
															<option value="" disabled>Select Project</option>
														</select>
														<label for="positionSelect">Position</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-floating mb-3">                    
														<input type="text" class="form-control" id="salary" name="salary" placeholder="Salary">
														<label for="salary">Salary</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-floating mb-3">
														<input type="date" class="form-control" placeholder="StartDate" id="floatingStartdate" name="startdate" placeholder="Start Date" required>
														<label for="floatingStartdate">Start Date</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-floating">
														<input type="date" class="form-control" id="EndDate" name="enddate" placeholder="End Date" required>
														<label for="floatingEnddate">End Date</label>
													</div>
												</div>
												<label style="margin: 0%;" for="floatingSelect">Place of Assignment</label>
												<div class="col-md-4">
													<div class="form-floating">
														<input type="text" class="form-control" id="placeofass" name="barangaycity" placeholder="Place of Assignment">
														<label for="floatingEnddate">(City/Municipality)</label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-floating">
														<select class="form-select" id="regionSelect" name="region" aria-label="State">
															<option>--SELECT--</option>
															@foreach($regions as $region)
															<option>{{$region->region_name}}</option>
															@endforeach
														</select>
														<label for="regionSelect">Region</label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-floating">
														<select class="form-select" id="provinceSelect" name="province" aria-label="State">
															<option value="" disabled>Select Region</option>
														</select>
														<label for="provinceSelect">Province</label>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-floating">
														<input type="text" class="form-control" id="EndDate" name="projremarks" placeholder="Project Remarks">
														<label for="floatingEnddate">Project Remarks</label>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-outline-success">Save</button>
												</div>
											</form>
											<!-- End floating Labels Form -->
										</div>
									</div>
								</div>
							</div>
							<!--/End modal-->
							<!--project list-->
							<!-- Table with hoverable rows -->
							<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th>ID</th>
										<th scope="col">Project Name</th>
										<th scope="col">Position</th>
										<th scope="col">Place of Assignment</th>
										<th scope="col">Date Start</th>
										<th scope="col">Date End</th>
										<th scope="col">Status</th>
										<th scope="col">Remarks</th>
										<th scope="col" style="text-align: center;">Options</th>
									</tr>
								</thead>
								<tbody>
									@foreach($projectemp as $data)
									<tr  @if($data->blacklist_id != 1)
									bgcolor="pink"
									@endif >
									<td>{{$data->projemploy_id}}</td>
									<th scope="row">{{$data->projectname}}</th>
									<td>{{$data->proj_pos_id}}</td>
									<td>{{ $data->place_region . ', ' . $data->place_province }}</td>
									<td>{{$data->start}}</td>
									<td>{{$data->end}}</td>
									<td><span class="
										@if($data->emp_status_id === 1) badge bg-success 
										@elseif($data->emp_status_id === 2) badge bg-info 
										@elseif($data->emp_status_id === 3) badge bg-warning  @endif">
										@if($data->emp_status_id === 1) Completed
										@elseif($data->emp_status_id === 2) Ongoing
										@elseif($data->emp_status_id === 3) Postponed @endif
										</span>
									</td>
									<td>{{$data->remarks}}</td>
									<td style="text-align: center;">
										<!-- <button type="button" class="btn btn-outline-primary edit-button" data-bs-toggle="modal" data-bs-target="#editModal{{$data->projemploy_id}}"><i class="bi bi-pencil-square"></i></button>     -->
										<button type="button" class="btn btn-outline-info" style="padding: 6px 15px 6px;" data-bs-toggle="modal" data-bs-target="#printmodal"><i class="bi bi-printer-fill"></i></button>
										@if($data->blacklist_id != 1)
										<button type="button" class="btn btn-outline-secondary" style="padding: 6px 15px 6px;" data-bs-toggle="modal" data-bs-target="#requestModal"><i class="bi bi-file-earmark-plus-fill"></i></button>
										@endif
										<button type="button" class="btn btn-outline-danger" style="padding: 6px 15px 6px;" data-bs-toggle="modal" data-bs-target="#removeproject" data-projectname="{{ $data->projectname }}"><i class="bi bi-trash"></i></button>
										{{-- Remove Project Modal --}}
										<div class="modal fade" id="removeproject" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="requestModalLabel" style="color: red;">Delete Project</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- Floating Labels Form -->
														<div class="row g-3">
															<div class="col-md-12">
																<h5 class="modal-title" style="text-align: center;">Are you sure you want to delete <span id="projectNamePlaceholder"></span> project?</h5>
															</div>
														</div>
														<!-- End floating Labels Form -->
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
														<button type="button" class="btn btn-outline-primary"data-bs-toggle="modal" data-bs-target="#requestremoveprojectpassword">Confirm</button>
													</div>
												</div>
											</div>
										</div>
										<div class="modal fade" id="requestremoveprojectpassword" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="requestModalLabel" style="color: red;">Deleting Project Confirmation</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form  action="{{ route('employee.deleteproject') }}" method="POST" class="row g-3">
															@csrf
															<div class="row g-3">
																<div class="col-md-12">
																	<p class="modal-title" style="text-align: center; font-weight: bold; font-size: 15px; margin-top: 10px; margin-bottom: 10px;">Please enter your password to verify:</p>
																</div>
																<div class="col-md-12">
																	<div class="col-md-12">
																		<div class="form-floating">
																			<input type="text" name="employee_id" value="{{$data->employee_id}}" hidden>
																			<input type="text" name="projemploy_id" value="{{$data->projemploy_id}}" hidden>
																			<input type="password" class="form-control" id="floatingCity" placeholder="Password" name="password">
																			<label for="floatingCity">Password</label>
																		</div>
																	</div>
																</div>
															</div>
														<!-- End floating Labels Form -->
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-outline-primary">Confirm</button>
													</form>
													</div>
												</div>
											</div>
										</div>

										<!--Blocklist Request Modal -->
										<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="requestModalLabel" style="color: Red;">Request to Print Certificate of Employement</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form class="row g-3" action="{{ route('employee.requestblacklist') }}" method="POST">
														@csrf
													<div class="modal-body">
														<input type="text" name="employee_id" value="{{$data->employee_id}}" hidden>
														<div class="alert alert-danger" role="alert" id="blacklistAlert" style="display: none;">Note: This person is blacklisted. Do you want to continue?</div>
														<div class="row" style="margin-left: 2px;">
															<div class="col-md-6" style="margin-top: 0px;">
																<div class="form-floating">
																	<input type="text" class="form-control"  placeholder="Place of Assignment" name="training">
																	<label for="floatingEnddate">Training</label>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-floating">
																	<input type="text" class="form-control"  placeholder="Place of Assignment" name="mandays">
																	<label for="floatingEnddate">Mandays</label>
																</div>
															</div>
														</div>
														<div class="row" style="margin-top:15px; margin-left: 2px;">
															<div class="col-md-3">
																<div class="form-floating mb-3">
																	<input type="date" class="form-control" placeholder="StartDate"  placeholder="Start Date" name="startdate1">
																	<label for="floatingStartdate">Start Date</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating">
																	<input type="date" class="form-control" placeholder="End Date" name="enddate1">
																	<label for="floatingEnddate">End Date</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating mb-3">
																	<input type="date" class="form-control" placeholder="StartDate"  placeholder="Start Date" name="startdate2">
																	<label for="floatingStartdate">Start Date</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating">
																	<input type="date" class="form-control"placeholder="End Date" name="enddate2">
																	<label for="floatingEnddate">End Date</label>
																</div>
															</div>
														</div>
														<!-- End floating Labels Form -->
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
														<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#requestblacklistpassword">Request</button>
											
													</div>
												</div>
											</div>
										</div>
										<div class="modal fade" id="requestblacklistpassword" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="requestModalLabel" style="color: red;">Request to Print Certificate of Employement</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													
														<div class="row g-3">
															<div class="col-md-12">
																<p class="modal-title" style="text-align: center; font-weight: bold; font-size: 15px; margin-top: 10px; margin-bottom: 10px;">Please enter your password to verify:</p>
															</div>
															<div class="col-md-12">
																<div class="col-md-12">
																	<div class="form-floating">
																		<input type="password" class="form-control" id="floatingCity" name="password" placeholder="Password">
																		<label for="floatingCity">Password</label>
																	</div>
																</div>
															</div>
														</div>
														<!-- End floating Labels Form -->
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-outline-primary">Confirm</button>
													</form>
													</div>
												</div>
											</div>
										</div>
										<!--/End Blocklist request modal-->
										<!-- Modal -->
										<div class="modal fade" id="printsmodal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="ModalLabel">Print Certificate</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form class="row g-3" action="{{ route('postcoepdf') }}" method="POST">
															@csrf
															<input type="text" name="employee_id" value="{{$data->employee_id}}" hidden>
															<input type="text" name="projemploy_id" value="{{$data->projemploy_id}}" hidden>
															<div class="form-group col-md-12" style="paddingg: 5px;">
																<label>NUMBER OF TRAINING MANDAYS</label>
																<input type="text" class="form-control mt-2" placeholder="Number Of Training Mandays" name="trainingmandays" value="" >
															</div>
															<div class="form-group col-md-12" style="padding: 5px;">
																<label>NUMBER OF MANDAYS</label>
																<input type="text" class="form-control mt-2" placeholder="Number Of Mandays" name="mandays" value="" >
															</div>
													</div>
													<div class="modal-footer">
													<button type="submit" class="btn btn-outline-success" data-bs-dismiss="modal">Submit</button>
													<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
													</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal -->
										<!-- <div class="modal fade editModal" id="editModal{{$data->projemploy_id}}" tabindex="-1" aria-labelledby="ModalLabel{{$data->projemploy_id}}" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="ModalLabel{{$data->projemploy_id}}">Edit Project</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form class="row g-3" action="{{ route('projectupdate', ['projemploy_id' => $data->projemploy_id]) }}" method="POST">
    														@csrf
															<input type="text" name="projemploy_id" value="{{$data->projemploy_id}}" hidden>
															<div class="col-md-12">
																<div class="form-floating">
																	<select class="form-select project-select" name="m_projectname" aria-label="State">
																		<option selected>{{ $data->projectname }}</option>
																		@foreach($projectlist as $projects)
																		<option>{{ $projects->projectname }}</option>
																		@endforeach
																	</select>
																	<label for="project-select">Project Name</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating mb-3">
																	<select class="form-select posselectmodal" name="position" aria-label="State">
																		<option selected>--SELECT--</option>
																	</select>
																	<label for="posselectmodal">Position</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating mb-3">                    
																	<input type="text" class="form-control" id="salary" name="salary" value="{{ $data->Salary }}" placeholder="Salary">
																	<label for="salary">Salary</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating mb-3">
																	<input type="date" class="form-control" placeholder="StartDate" id="floatingStartdate" value="{{ $data->start }}" name="start_date" placeholder="Start Date">
																	<label for="floatingStartdate">Start Date</label>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-floating">
																	<input type="date" class="form-control" id="EndDate" value="{{ $data->end }}" name="end_date" placeholder="End Date">
																	<label for="floatingEnddate">End Date</label>
																</div>
															</div>
															<label style="margin: 0%;" for="floatingSelect">Place of Assignment</label>
															<div class="col-md-4">
																<div class="form-floating">
																	<input type="text" class="form-control" id="placeofass" name="barangaycity" value="{{ $data->brgycity }}">
																	<label for="floatingEnddate">(City/Municipality)</label>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-floating">
																	<select class="form-select regionSelectModal" name="region" aria-label="State">
																		<option selected>{{ $data->place_region }}</option>
																		@foreach($regions as $region)
																		<option>{{ $region->region_name }}</option>
																		@endforeach
																	</select>
																	<label for="regionSelectModal">Region</label>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-floating">
																	<select class="form-select provinceSelectModal" name="province" aria-label="State">
																		<option value="" disabled>Select Region first</option>
																	</select>
																	<label for="provinceSelectModal">Province</label>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-floating">
																	<input type="text" class="form-control" id="EndDate" name="projremarks" placeholder="Project Remarks">
																	<label for="floatingEnddate">Project Remarks</label>
																</div>
															</div>
<!-- 
														<hr>
														<div class="row g-3">
															<div style="text-align: left; ">
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="gridCheck">
																	<label class="form-check-label" for="gridCheck">
																	<span style="color: red;">BLACKLIST</span>
																	</label>
																</div>
															</div>
															<div id="blocklistContainer" style="display: none;">
																<div class="col-md-12">
																	<div class="form-floating">
																		
																		<select  class="form-select" id="floatingSelect" name="blacklist" aria-label="State">
																			<option selected>--SELECT--</option>
																			<option value="1">Terminated</option>
																			<option value="2">Resigned</option>
																			<option value="2">Dec</option>
																		</select>
																		<label style="color: red;" for="floatingSelect">BLACKLIST</label>
																	</div>
																</div>
																<div class="col-md-12" style="margin-top: 10px;">
																	<div class="form-floating">
																		<input type="text" class="form-control" id="floatingCity" name="blacklist_remarks" placeholder="Remarks">
																		<label style="color: red;" for="floatingCity">REMARKS</label>
																	</div>
																</div>
															</div>
														</div>
													
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-outline-success">Save</button>
													</div>
													</form>
												</div>
											</div>
										</div> -->
										<!--/End modal-->
										<!-- PRINT COE-->
										<div class="modal fade" id="printmodal" tabindex="-1" aria-labelledby="printmodalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="requestModalLabel">Print Certificate Of Employement</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<div class="row" style="margin-left: 0px;">
															<form action="{{ route('postcoepdf') }}" method="POST" class="row g-3">
																@csrf
																<div class="col-md-6" style="margin-top: 0px;">
																	<div class="form-floating"> 
																		<input type="text" name="employee_id" value="{{ $data->employee_id }}" hidden>
                                    <input type="text" name="projemploy_id" value="{{ $data->projemploy_id }}" hidden>
																		<input type="text" class="form-control" id="EndDate" name="training" placeholder="Place of Assignment">
																		<label for="floatingEnddate">Training</label>
																	</div>
																</div>
																<div class="col-md-6"  style="margin-top: 0px; margin-left: 0px;">
																	<div class="form-floating">
																		<input type="text" class="form-control" id="EndDate" name="mandays" placeholder="Place of Assignment">
																		<label for="floatingEnddate">Mandays</label>
																	</div>
																</div>
														</div>
														<div class="row" style="margin-top:15px; margin-left: 0px;">
                              <div class="col-md-3">
                                <div class="form-floating mb-3">
                                  <input type="date" class="form-control" placeholder="StartDate" name="startDate1" id="floatingStartdate" placeholder="Start Date">
                                  <label for="floatingStartdate">Start Date</label>
                                </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-floating">
                                    <input type="date" class="form-control" id="EndDate" name="endDate1" placeholder="End Date">
                                    <label for="floatingEnddate">End Date</label>
                                  </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="startDate2"  id="floatingStartdate" placeholder="Start Date">
                                    <label for="floatingStartdate">Start Date</label>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                  <div class="form-floating">
                                    <input type="date" class="form-control" id="EndDate" name="endDate2" placeholder="End Date">
                                    <label for="floatingEnddate">End Date</label>
                                </div>
                              </div>
														</div>
                            <div class="form-group col-md-12">
                              <label for="floatingPosition">Authorized Signatory</label>
                              <select class="form-control form-control-user" name="signatory" required>
								<option value="" style="text-align: center;">Select Options</option>
								@foreach($signatory as $data)
									<option value="{{ $data->authorizedID }}" style="text-align: center;">{{ $data->LastName.', '.$data->FirstName.' '. $data->MiddleName .'('.$data->Auth_Position.')'}}</option>
								@endforeach
                              </select>
                            </div>
                            
                            <!-- Freddieeeeeee, dugangi ug dropdown diri biii nga diri sila magpili kung kinsa mag sign sa certificate.
                            Kato bitawng gibuhat nato sa users and perm. -->
                            <!-- OKI DOKI <3-->
														<!-- End floating Labels Form -->
													</div>
													<div class="modal-footer">
													<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-outline-success" data-bs-toggle="modal">Request</button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</td>
									@endforeach
									</tr>
									<!-- Modal -->
									<div class="modal fade" id="requestprintpassword" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="requestModalLabel" style="color: red;">Request Form</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form class="row g-3">
														<div class="col-md-12">
															<p class="modal-title" style="text-align: center; font-weight: bold; font-size: 15px; margin-top: 10px; margin-bottom: 10px;">Please enter your password to verify:</p>
														</div>
														<div class="col-md-12">
															<div class="col-md-12">
																<div class="form-floating">
																	<input type="password" class="form-control" id="floatingCity" placeholder="Password">
																	<label for="floatingCity">Password</label>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-outline-primary">Confirm</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal -->
									
									</td>
									</tr>
								</tbody>
							</table>
							<!-- End Table with hoverable rows -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/DRE MO PAG DESIGN-->
	</main>
	<!-- End #main -->
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<script>
							// Close the first modal and remove its backdrop
								$('#activateModal').modal('hide');
								$('.modal-backdrop').remove();

								// Close the second modal and remove its backdrop
								$('#yesActivateModal').modal('hide');
								$('.modal-backdrop').remove();
							</script>
	<script>
		$(document).ready(function() {
			$('#removeproject').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
				var projectName = button.data('projectname'); // Extract the project name from data-projectname attribute
				$('#projectNamePlaceholder').text(projectName); // Set the project name in the modal body
			});

		  // Hide the "BLOCKLIST" and "REMARKS" fields initially
		  $("#blocklistContainer").hide();
		
		  // Handle the checkbox change event
		  $("#gridCheck").change(function() {
		    if ($(this).is(":checked")) {
		      // Show the "BLOCKLIST" and "REMARKS" fields
		      $("#blocklistContainer").show();
		    } else {
		      // Hide the "BLOCKLIST" and "REMARKS" fields
		      $("#blocklistContainer").hide();
		    }
		  });
		});
		
		
		
	
	</script>
	<script>
		$(document).ready(function () {
		// Setup - add a text input to each footer cell
		$('#example thead tr')
		
		.clone(true)
		.addClass('filters')
		.appendTo('#example thead');
		
		var table = $('#example').DataTable({
		"searching": true,
		"paging":   false,
		"ordering": false,
		"info":     false,
		orderCellsTop: true,
		fixedHeader: true,
		initComplete: function () {
		    var api = this.api();
		
		    // For each column
		    api
		        .columns()
		        .eq(0)
		        .each(function (colIdx) {
		            // Set the header cell to contain the input element
		            var cell = $('.filters th').eq(
		                $(api.column(colIdx).header()).index()
		            );
		            var title = $(cell).text();
		            $(cell).html('<input type="text" placeholder="' + title + '" />');
		
		            // On every keypress in this input
		            $(
		                'input',
		                $('.filters th').eq($(api.column(colIdx).header()).index())
		            )
		                .off('keyup change')
		                .on('change', function (e) {
		                    // Get the search value
		                    $(this).attr('title', $(this).val());
		                    var regexr = '({search})'; //$(this).parents('th').find('select').val();
		
		                    var cursorPosition = this.selectionStart;
		                    // Search the column for that value
		                    api
		                        .column(colIdx)
		                        .search(
		                            this.value != ''
		                                ? regexr.replace('{search}', '(((' + this.value + ')))')
		                                : '',
		                            this.value != '',
		                            this.value == ''
		                        )
		                        .draw();
		                })
		                .on('keyup', function (e) {
		                    e.stopPropagation();
		
		                    $(this).trigger('change');
		                    $(this)
		                        .focus()[0]
		                        .setSelectionRange(cursorPosition, cursorPosition);
		                });
		        });
		},
		});
		});
		
		$(document).ready(function(){
		$('.alert-success').fadeIn().delay(10000).fadeOut();
		});
		
		//Dynamic dropdown for project and position
		$(document).ready(function() {
		$('#projectNameSelect').change(function() {
		    var projectname = $(this).val(); // get the selected Project Name value
		    if (projectname) {
		        $.ajax({
		            type: "GET",
		            url: "/employee/project/" + encodeURI(projectname),
		            dataType: "json",
		            success: function(data) {
		              console.log(data)
		                // clear current options in Position dropdown
		                $('#positionSelect').empty();
		                // add new options to Position dropdown
		                $.each(data, function(key, value) {
		                    $('#positionSelect').append('<option value="' + value.position + '">' + value.position + '</option>');
		                });
		            },
		            error: function(jqXHR, textStatus, errorThrown) {
		                console.log(textStatus, errorThrown);
		            }
		        });
		    } else {
		        // clear options in Position dropdown if no Project Name is selected
		        $('#positionSelect').empty();
		        $('#positionSelect').append('<option value="" disabled>Select Project</option>');
		    }
		});
		});
		
		//Dynamic dropdown for region and province
		$(document).ready(function() {
		    $('#regionSelect').change(function() {
		        var regionname = $(this).val(); // get the selected Project Name value
		        if (regionname) {
		            $.ajax({
		                type: "GET",
		                url: "/employee/region/" + encodeURI(regionname),
		                dataType: "json",
		                success: function(data) {
		                  
		                    // clear current options in Position dropdown
		                    $('#provinceSelect').empty();
		                    // add new options to Position dropdown
		                    $.each(data, function(key, value) {
		                        $('#provinceSelect').append('<option value="' + value.province_name + '">' + value.province_name + '</option>');
		                    });
		                    console.log(data)
		                },
		                error: function(jqXHR, textStatus, errorThrown) {
		                    console.log(textStatus, errorThrown);
		                }
		            });
		        } else {
		            // clear options in province dropdown if no region  is selected
		            $('#provinceSelect').empty();
		            $('#provinceSelect').append('<option value="" disabled>Select Region</option>');
		        }
		    });
		});
		
		$(document).ready(function() {
		  $('#editModal').on('show.bs.modal', function(event) {
		    var button = $(event.relatedTarget); // Button that triggered the modal
		    var id = button.data('id'); // Extract ID from data-id attribute
		    var modal = $(this);
		    console.log(id);
		   
		    $.ajax({
		      url: '/employee/editemp/' + id,
		      type: 'GET',
		      dataType: 'json',
		      success: function(data) {
		        // Set the values of the input fields to the data
		        console.log(data);
		        // modal.find('#project-name').val(data.projectname);
		        // modal.find('#position').val(data.proj_pos_id);
		        // modal.find('#place-of-assignment').val(data.place_region + ', ' + data.place_province);
		        // modal.find('#date-start').val(data.start);
		        // modal.find('#date-end').val(data.end);
		        // modal.find('#status').val(data.emp_status_id);
		        // modal.find('#remarks').val(data.remarks);
		      },
		      error: function(xhr, status, error) {
		        // Handle error
		      }
		    });
		  });
		});
		//ADD EDIT CHECK KUNG MAG ADD OG PROJECT POSITION NGA EXISTING NA
		
		  // Get all edit buttons
		  const editButtons = document.querySelectorAll('.edit-button');
		  
		  // Add click event listener to each edit button
		  editButtons.forEach(button => {
		    button.addEventListener('click', event => {
		      const projectId = event.target.dataset.projectId; // Get the project ID
		      const projectSelect = document.getElementById('project-select'); // Get the project select element
		      const options = projectSelect.options;
		      
		      // Loop through the options to find the selected project name
		      for (let i = 0; i < options.length; i++) {
		        if (options[i].text === event.target.closest('tr').querySelectorAll('td')[1].innerText) {
		          options[i].selected = true; // Set the selected option
		          break;
		        }
		      }
		    });
		  });
		
		  //MODAL STUFF
		  //Dynamic dropdown for project and position in modal
		  $(document).ready(function() {
		      // Function to handle the dynamic project and position dropdown
		      function handleProjectSelect() {
		          var projectSelect = $(this);
		          var projectname = projectSelect.val();
		          var posselectmodal = projectSelect.closest('.modal-body').find('.posselectmodal');
		
		          if (projectname) {
		              $.ajax({
		                  type: "GET",
		                  url: "/employee/project/" + encodeURI(projectname),
		                  dataType: "json",
		                  success: function(data) {
		                      posselectmodal.empty();
		                      $.each(data, function(key, value) {
		                          posselectmodal.append('<option value="' + value.position + '">' + value.position + '</option>');
		                      });
		                  },
		                  error: function(jqXHR, textStatus, errorThrown) {
		                      console.log(textStatus, errorThrown);
		                  }
		              });
		          } else {
		              posselectmodal.empty();
		              posselectmodal.append('<option value="" disabled>Select Project</option>');
		          }
		      }
		
		      // Function to handle the dynamic region and province dropdown
		      function handleRegionSelect() {
		          var regionSelect = $(this);
		          var regionname = regionSelect.val();
		          var provinceSelectModal = regionSelect.closest('.modal-body').find('.provinceSelectModal');
		
		          if (regionname) {
		              $.ajax({
		                  type: "GET",
		                  url: "/employee/region/" + encodeURI(regionname),
		                  dataType: "json",
		                  success: function(data) {
		                      provinceSelectModal.empty();
		                      $.each(data, function(key, value) {
		                          provinceSelectModal.append('<option value="' + value.province_name + '">' + value.province_name + '</option>');
		                      });
		                  },
		                  error: function(jqXHR, textStatus, errorThrown) {
		                      console.log(textStatus, errorThrown);
		                  }
		              });
		          } else {
		              provinceSelectModal.empty();
		              provinceSelectModal.append('<option value="" disabled>Select Region</option>');
		          }
		      }
		
		      // Attach the event handlers to the respective elements
		      $('.project-select').change(handleProjectSelect);
		      $('.regionSelectModal').change(handleRegionSelect);
		
		      // Execute the script when the modal is shown
		      $('.editModal').on('shown.bs.modal', function() {
		          // Find the relevant dropdowns within the modal and trigger the change event
		          var modal = $(this);
		          var projectSelect = modal.find('.project-select');
		          var regionSelect = modal.find('.regionSelectModal');
		          
		          projectSelect.change();
		          regionSelect.change();
		      });
		  });
		  
		  $('#requestModal').on('shown.bs.modal', function () {
		$('#blacklistAlert').show(); // Show the alert when the modal is displayed
		
		// Hide the alert after 5 seconds
		setTimeout(function() {
		$('#blacklistAlert').hide();
		}, 5000);
		});
		
		$(document).ready(function() {
		// Keep track of whether any input fields have been changed
		var isFormDirty = false;
		
		// Listen for input events on the form fields
		$('.modal-body input, .modal-body select').on('input change', function() {
		isFormDirty = true;
		updateSubmitButtonState();
		});
		
		// Update the state of the Submit button
		function updateSubmitButtonState() {
		var submitButton = $('.modal-footer button[type="submit"]');
		
		if (isFormDirty) {
		submitButton.prop('disabled', false); // Enable the button
		} else {
		submitButton.prop('disabled', true); // Disable the button
		}
		}
		
		// Initialize the state of the Submit button
		updateSubmitButtonState();
		});
	</script>
	@endsection