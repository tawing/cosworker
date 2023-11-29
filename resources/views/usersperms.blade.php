@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
@endphp

@if($users != NULL)

@extends('layouts.layout') @section('content')
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#0c2559;">
	<div class="d-flex align-items-center justify-content-between">
		<img src="../assets/img/PSA.png" class="PSAimage" alt="PSA Logo" />
		<a href="dashboard.html" class="logo d-flex align-items-center" style="margin: 0px;">
		<span class="app-brand-logo demo"> </span>
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
				 @if($users->usertype_id === 1)
					Administrator
				 @else
					System Administrator
				 @endif</span>
			  </a><!-- End Profile Iamge Icon -->
			  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
				 <li class="dropdown-header">
					<h6>{{ $users->firstname." ".$users->lastname }}</h6>
					<span>{{ $users->position_name }}</span>
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
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ url('/home') }}">
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
			<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>LOGS</span><i class="bi bi-chevron-down ms-auto"></i> </a>
			<ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
				<li>
					<a href="{{ url('/certificate_log') }}"> <i class="bi bi-circle"></i><span>Certificate LOGS</span> </a>
				</li>
				<li>
					<a href="{{ url('/blacklist_log') }}"> <i class="bi bi-circle"></i><span>Blacklist Certificate LOGS</span> </a>
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
			<a class="nav-link active" href="{{ url('/usersandperm') }}">
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
				<li class="breadcrumb-item active">Users & Permission</li>
			</ol>
		</nav>
		@if(session()->has('success'))
		<div class="alert alert-success" id="success-alert">
			{{ session()->get('success') }}
		</div>
		@endif
		<script>
			setTimeout(function() {
			    $('#success-alert').fadeOut('slow');
			}, 5000);
		</script>
	</div>
	<!-- End Page Title -->
	<!--DRE MO PAG DESIGN-->
	<!-- Users & Permission Table -->
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Users & Permission</h5>
			
			<p class="font-weight-500 hide">The deafult password of the users added is admin1234. You can change your password in the Account Settings.</p>
			<button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal" data-bs-target="#addadminModal"><i class="bi bi-plus-square" style="padding-right: 5px;"></i> Add new Administrator</button>
			<!-- add new admin Modal -->
			<div class="modal fade" id="addadminModal" tabindex="-1" role="dialog" aria-labelledby="addadminModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Administrator</h5>
						</div>
						<div class="modal-body" style="padding: 27px;">
							<form id="user-form" method="POST" action="{{ route('usersandperm.storeAdmin') }}">
								@csrf
								<div class="row">
									<div class="col-md-12" id="profile">
										<div class="form-row">
											<div class="row g-3">
												<div class="form-group col-md-4">
													<label>Last Name</label>
													<input type="text" class="form-control" placeholder="Last Name" name="last_name" required />
													@error('last_name')
													<div class="alert alert-danger" role="alert">
														INPUT REQUIRED: A-Z
													</div>
													@enderror
												</div>
												<div class="form-group col-md-4">
													<label>First Name</label>
													<input type="text" class="form-control" placeholder="First Name" name="first_name" required />
													@error('first_name')
													<div class="alert alert-danger" role="alert">
														INPUT REQUIRED: A-Z
													</div>
													@enderror
												</div>
												<div class="form-group col-md-4">
													<label>Middle Name</label>
													<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" />
													@error('middle_name')
													<div class="alert alert-danger" role="alert">
														INPUT REQUIRED: A-Z
													</div>
													@enderror
												</div>
											</div>
											<div class="row g-3">
												<div class="form-group col-md-4">
													<label>Username</label>
													<input type="text" class="form-control" placeholder="Username" name="user_name" required />
													@error('user_name')
													<div class="alert alert-danger" role="alert">
														INPUT REQUIRED: A-Z
													</div>
													@enderror
												</div>
												<div class="form-group col-md-4">
													<label>Email</label>
													<input type="text" class="form-control" placeholder="Email" name="email" required />
													@error('email')
													<div class="alert alert-danger" role="alert">
														INPUT REQUIRED: @ and .com
													</div>
													@enderror
												</div>
												<div class="form-group col-md-4">
													<label for="floatingPosition">Position</label>
													<select class="form-control form-control-user" name="position" required>
														<option value="" style="text-align: center;">- - - - - SELECT - - - - -</option>
														<option value="1" style="text-align: center;"> Auditor</option>
														<option value="2" style="text-align: center;"> Statistical Specialist</option>
														<option value="3" style="text-align: center;"> Survey Management</option>
													</select>
												</div>
											</div>
											<div class="form-group col-md-6" style="align-self: center; margin: auto; width: 50%; padding: 10px;">
												<label style="align-self: center; margin: auto; width: 50%; padding: 10px;">User Role</label>
												<select class="form-control form-control-user" name="usertype" required>
													<option value="" style="text-align: center;">- - - - - - - - - - - - - - - -SELECT- - - - - - - - - - - - - - - - -</option>
													<option value="1" style="text-align: center;"> SuperAdministrator</option>
													<option value="2" style="text-align: center;"> Administrator</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-outline-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--/End add new admin Modal-->
			<table class="table table-borderless datatable display" id="example">
				<thead>
					<tr>
						<th scope="col">Last Name</th>
						<th scope="col">First Name</th>
						<th scope="col">Middle Name</th>
						<th scope="col">Username</th>
						<th scope="col">Email</th>
						<th scop="col">Position</th>
						<th scope="col">User Role</th>
						<th scope="col" style="text-align: center; width: 250px;">Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user as $data)
						<tr>
							<td>{{$data->lastname}}</td>
							<td>{{$data->firstname}}</td>
							<td>{{$data->middlename}}</td>
							<td>{{$data->username}}</td>
							<td>{{$data->email}}</td>
							<td><span>
                      @if($data->position_id === 1) Auditor
                      @elseif($data->position_id === 2) Statistical Specialist
                      @elseif($data->position_id === 3) Survey Management @endif
                      </span>

							</td>
							<td>{{$data->usertype}}</td>
							<td style="text-align: center;">
							@if($data->deactivate == 1)
								<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#activateModal{{$data->users_id}}">Activate</button>
								<div class="modal fade" id="activateModal{{$data->users_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="activateModalLabel">Activate User</h5>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to activate this user?</p>
											</div>
											<div class="modal-footer">
												<form method="POST" action="{{ route('usersandperm.activate', $data->users_id) }}">
													@csrf
													<input type="hidden" name="id" value="{{ $data->users_id }}" />
													<button type="submit" class="btn btn-danger">Yes</button>
												</form>
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
											</div>
										</div>
									</div>
								</div>
							@else
								<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deactivateModal{{$data->users_id}}">Deactivate</button>
								<div class="modal fade" id="deactivateModal{{$data->users_id}}" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Deactivate User</h5>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to deactivate this user?</p>
											</div>
											<div class="modal-footer">
												<form method="POST" action="{{ route('usersandperm.deactivate', $data->users_id) }}">
													@csrf
													<input type="hidden" name="id" value="{{ $data->users_id }}" />
													<button type="submit" class="btn btn-danger">Yes</button>
												</form>
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
											</div>
										</div>
									</div>
								</div>
							@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<!-- /End Users & Permission Table -->
	<!--Signatory Table-->
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Authorized Signatory</h5>
			<table class="table">
				<button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal" data-bs-target="#Modaladdsignatory"><i class="bi bi-plus-square" style="padding-right: 5px;"></i> Add new</button>
				<!-- add authorized signatory Modal -->
				<div class="modal fade" id="Modaladdsignatory" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Authorized Signatory</h5>
							</div>
							<div class="modal-body">
								<form class="row g-3" id="auth-user-form" method="POST" action="{{ route('usersandperm.authstore') }}">
									@csrf
									<div class="row g-3" style="padding: 15px 0px 15px 0px;">
										<div class="col-md-4">
											<div class="form-floating">
												<input type="text" class="form-control" id="floatingLastName" name="lastname" placeholder="Last Name" />
												<label for="floatingLastName">Last Name</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-floating">
												<input type="text" class="form-control" id="floatingFirstName" name="firstname" placeholder="First Name" />
												<label for="floatingFirstName">First Name</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-floating">
												<input type="text" class="form-control" id="floatingMname" name="middlename" placeholder="Middle Name" />
												<label for="floatingMname">Middle Name</label>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-floating">
											<input type="text" class="form-control" id="floatingPosition" name="position" placeholder="Position" />
											<label for="floatingPosition">Position</label>
										</div>
									</div>
								<!--/div after div modal body-->
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-outline-primary">Add</button>
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
							</div>
						</form>
						</div>
					</div>
				</div>
				<!--/End add authorized signatory Modal-->
				<table class="table table-borderless datatable display" id="sample">
					<thead>
						<tr>
							<th scope="col">Last Name</th>
							<th scope="col">First Name</th>
							<th scope="col">Middle Name</th>
							<th scope="col">Position</th>
							<th scope="col" style="text-align: center; width: 250px;">Options</th>
						</tr>
					</thead>
					<tbody>
						@foreach($auth as $data)
							<tr>
								<td>{{$data->LastName}}</td>
								<td>{{$data->FirstName}}</td>
								<td>{{$data->MiddleName}}</td>
								<td>{{$data->Auth_Position}}</td>
								<td style="text-align: center;">
									<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updatesignatoryModal-{{ $data->authorizedID }}">Update</button>
									@if($data->Deactivated == 1)
										<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#authactivateModal-{{ $data->authorizedID }}">Activate</button>
										<div class="modal fade" id="authactivateModal-{{ $data->authorizedID }}" tabindex="-1" role="dialog" aria-labelledby="authactivateModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="activateModalLabel">Activate User</h5>
													</div>
													<div class="modal-body">
														<p>Are you sure you want to activate this user?</p>
													</div>
													<div class="modal-footer">
														<form method="POST" action="{{ route('usersandperm.authactivate', $data->authorizedID) }}">
															@csrf
															<input type="hidden" name="id" value="{{ $data->authorizedID }}" />
															<button type="submit" class="btn btn-danger">Yes</button>
														</form>
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
													</div>
												</div>
											</div>
										</div>
									@else
									<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#authdeactivateModal-{{ $data->authorizedID }}">Deactivate</button>
										<div class="modal fade" id="authdeactivateModal-{{ $data->authorizedID }}" tabindex="-1" role="dialog" aria-labelledby="authdeactivateModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Deactivate User</h5>
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p>Are you sure you want to deactivate this user?</p>
													</div>
													<div class="modal-footer">
														<form method="POST" action="{{ route('usersandperm.authdeactivate', $data->authorizedID) }}">
															@csrf
															<input type="hidden" name="id" value="{{ $data->authorizedID }}" />
															<button type="submit" class="btn btn-danger">Yes</button>
														</form>
														<button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">No</button>
													</div>
												</div>
											</div>
										</div>
									@endif
								</td>
							</tr>

							<!-- update authorized signatory Modal -->
							<div class="modal fade" id="updatesignatoryModal-{{ $data->authorizedID }}" tabindex="-1" aria-labelledby="updatesignatoryModalLabel-{{ $data->authorizedID }}" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="updatesignatoryModalLabel-{{ $data->authorizedID }}">Update Authorized Signatory</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Floating Labels Form -->
											<form class="row g-3" action="{{ route('usersandperm.updateauth', $data->authorizedID) }}" method="POST">
												@csrf
												<input type="hidden" name="id" value="{{ $data->authorizedID }}" />
												<div class="row g-3" style="padding: 15px 0px 15px 0px;">
													<div class="col-md-4">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="lastname" placeholder="Last Name" value="{{ $data->LastName }}"/>
															<label for="floatingLastName">Last Name</label>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="firstname" placeholder="First Name"  value="{{ $data->FirstName }}"/>
															<label for="floatingFirstName">First Name</label>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingMname" name="middlename" placeholder="Middle Name"  value="{{ $data->MiddleName }}"/>
															<label for="floatingMname">Middle Name</label>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-floating">
														<input type="text" class="form-control" id="floatingPosition" name="position" placeholder="Position"  value="{{ $data->Auth_Position }}"/>
														<label for="floatingPosition">Position</label>
													</div>
												</div>
											
												<!-- End floating Labels Form -->
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-outline-primary">Update</button>
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
										</div>
											</form>
										<!-- Rest of your modal content -->
									</div>
								</div>
							</div>
						@endforeach
						
						<!--End update authorized signatory Modal-->
					</tbody>
				</table>
			</div>
		</div>
				<!--/Signatory Table-->
				<!--Clearance Asignatory Table-->
				<!-- <div class="card">
					<div class="card-body">
						<h5 class="card-title">Authorized Clearance Signatory</h5>
						<table class="table">
							<button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal" data-bs-target="#Modalclearancesignatory"><i class="bi bi-plus-square" style="padding-right: 5px;"></i> Add new</button>
							<div class="modal fade" id="Modalclearancesignatory" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-xl">
									<div class="modal-content">
										<div class="modal-header" style="text-align:center;">
											<h5 class="modal-title" >Add Authorized Clearance Asignatory</h5>
										</div>
										<div class="modal-body">
											<form class="row g-3" id="auth-user-form" method="POST" action="{{ route('usersandperm.clearstore') }}">
												@csrf
												<div class="row g-3" style="padding: 15px 0px 15px 0px;">
												<Label style="text-align:center;"><h4> CLEARANCE FROM WORK-RELATED ACCOUNTABILITIES</h4></Label>
													<div class="col-md-6">
														<p>Immediate Supervisor</p>
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<p>Head of office</p>
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Full Name</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 15px 0px 	5px 0px;">
												<Label style="text-align:center;"><h4> CLEARANCE FROM MONEY AND PROPERTY ACCOUNTABILITIES</h4></Label>
												<h5>1. Administration Services</h5>
													<p style="text-align:center;">a. Supply and Property Procurement of Management</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 5px 0px 5px 0px;">
													<div class="col-md-6">
														
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 8px 0px 5px 0px;">
													<p style="text-align:center;">b. Human Resource Division</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 15px 0px 	5px 0px;">
													<p style="text-align:center;">c. PSA - accredited Union/Cooperative</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 5px 0px 5px 0px;">
													<div class="col-md-6">
														
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 8px 0px 5px 0px;">
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 15px 0px 5px 0px;">
												<h5>2. Library</h5>
													<p style="text-align:center;">a. Legal Office Library</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 10px 0px 1px 0px;">
													<p style="text-align:center;">b. Library Services</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 15px 0px 5px 0px;">
												<h5>3. Finance and Assets Management</h5>
													<p style="text-align:center;">a. Cashier</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 10px 0px 1px 0px;">
													<p style="text-align:center;">b. Accounting (RSSO/PSO)</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 10px 0px 1px 0px;">
													<p style="text-align:center;">c. Accounting Division</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 15px 0px 5px 0px;">
												<h5>4. Proffesional and Institutional Development</h5>
													<p style="text-align:center;">a. Scholarship Services</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												<div class="row g-3" style="padding: 10px 0px 1px 0px;">
												<h5>CERTIFICATION OF NO PENDING ADMINISTRATIVE CASE:</h5>
													<p style="text-align:center;">1. Legal Services</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
												
												<div class="row g-3" style="padding: 10px 0px 1px 0px;">
												<h5>CERTIFICATION</h5>
													<p style="text-align:center;">Undersecretary</p>
													<div class="col-md-6">			
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" />
															<label for="floatingLastName">Full Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" />
															<label for="floatingFirstName">Position:</label>
														</div>
													</div>
												</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-outline-primary">Add</button>
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<table class="table table-borderless datatable display" id="sample">
								<thead>
									<tr>
										<th scope="col">Last Name</th>
										<th scope="col">First Name</th>
										<th scope="col">Middle Name</th>
										<th scope="col">Position</th>
										<th scope="col" style="text-align: center; width: 250px;">Options</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										@foreach($clear as $data)
										<td>{{$data->Lastname}}</td>
										<td>{{$data->Firstname}}</td>
										<td>{{$data->Middlename}}</td>
										<td>{{$data->Auth_pos}}</td>
										<td style="text-align: center;">
											<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateclearanceModal-{{ $data->clearance_ID }}">Update</button>
											@if($data->Deactivate == 1)
											<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#clearactivateModal">Activate</button>
											<div class="modal fade" id="clearactivateModal" tabindex="-1" role="dialog" aria-labelledby="clearactivateModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="activateModalLabel">Activate User</h5>
														</div>
														<div class="modal-body">
															<p>Are you sure you want to activate this user?</p>
														</div>
														<div class="modal-footer">
															<form method="POST" action="{{ route('usersandperm.clearactivate', $data->clearance_ID) }}">
																@csrf
																<input type="hidden" name="id" value="{{ $data->clearance_ID }}" />
																<button type="submit" class="btn btn-danger">Yes</button>
															</form>
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
														</div>
													</div>
												</div>
											</div>
											@else
											<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cleardeactivateModal">Deactivate</button>
											<div class="modal fade" id="cleardeactivateModal" tabindex="-1" role="dialog" aria-labelledby="cleardeactivateModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Deactivate User</h5>
														</div>
														<div class="modal-body">
															<p>Are you sure you want to deactivate this user?</p>
														</div>
														<div class="modal-footer">
															<form method="POST" action="{{ route('usersandperm.cleardeactivate', $data->clearance_ID) }}">
																@csrf
																<input type="hidden" name="id" value="{{ $data->clearance_ID }}" />
																<button type="submit" class="btn btn-danger">Yes</button>
															</form>
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
														</div>
													</div>
												</div>
											</div>
											@endif
										</td>
									</tr>
									
									<div class="modal fade" id="updateclearanceModal-{{ $data->clearance_ID }}" tabindex="-1" aria-labelledby="updateclearanceModalLabel-{{ $data->clearance_ID }}" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="updateclearanceModalLabel-{{ $data->clearance_ID }}">Update Clearance Signatory</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form class="row g-3" action="{{ route('usersandperm.updateclearstore',$data->clearance_ID) }}" method="POST">
														@csrf
														<input type="hidden" name="clearsignatory" value="{{ $data->clearance_ID}}"/> 
														<div class="row g-3" style="padding: 15px 0px 15px 0px;">
															<div class="col-md-4">
																<div class="form-floating">
																	<input type="text" class="form-control" id="floatingLastName" name="last_name" placeholder="Last Name" value="{{ $data->Lastname }}"/>
																	<label for="floatingLastName">Last Name</label>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-floating">
																	<input type="text" class="form-control" id="floatingFirstName" name="first_name" placeholder="First Name" value="{{ $data->Firstname }}"/>
																	<label for="floatingFirstName">First Name</label>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-floating">
																	<input type="text" class="form-control" id="floatingMname" name="middle_name" placeholder="Middle Name" value="{{ $data->Middlename }}"/>
																	<label for="floatingMname">Middle Name</label>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-floating">
																<input type="text" class="form-control" id="floatingPosition" name="clearposition" placeholder="Position" value="{{ $data->Auth_pos }}"/>
																<label for="floatingPosition">Position</label>
															</div>
														</div>
													
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-outline-primary">Update</button>
													<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
												</div>
											</form>
											</div>
										</div>
									</div>
									@endforeach
								
								</tbody>
							</table> -->
		</div>
	</div>
</main>
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