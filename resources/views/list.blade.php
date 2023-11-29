@extends('layouts.layout')
@section('content')
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
		<h1>Philippine Statistics Authority</h1>
		<!-- <nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
				<li class="breadcrumb-item active"><a href="projects.html">Projects</a></li>
				<li class="breadcrumb-item active">Project Details</li>
			</ol>
		</nav> -->
	</div>
	<!-- End Page Title -->
	<!--DRE MO PAG DESIGN-->
	<section class="section dashboard">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-12">
						<div class="card recent-sales overflow-auto">
							<div class="card-body parent" >
								@if($title === 'Active Employee')
								<h3 class="card-title"> {{$title}} </h3> 
								@elseif($title === 'Inactive Employee')
								<h3 class="card-title"> {{$title}} </h3>
								@endif
								<h5 class="title"></h5>
								<p><p>

								<table class="table table-borderless datatable child-right" id="example" style="width: 100%;">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Last Name</th>
											<th scope="col">First Name</th>
											<th scope="col">Middle Name</th>
											<th scope="col">Suffix</th>
											<th scope="col">Sex</th>
											<th scope="col">Option</th>
										</tr>
									</thead>
									
									<tbody>
										@if($title === 'Active Employee')
											@foreach($activelist as $key => $data)
											<tr>
												<th>{{$key+1}}</th>
												<td>{{$data->lastname}}</td>
												<th>{{$data->firstname}}</th>
												<td>{{$data->middlename}}</td>
												<th>{{$data->name_ext}}</th>
												<td>{{$data->gender}}</td>
												<td >
													<a href="{{ url('/employee/'.$data->employee_id)}}">
													<button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" >
													View
													</button>
												</a>
												</td>
											</tr>
											@endforeach

										@elseif($title === 'Inactive Employee')
											@foreach($inactivelist as $key => $data)
											<tr>
												<th>{{$key+1}}</th>
												<td>{{$data->lastname}}</td>
												<th>{{$data->firstname}}</th>
												<td>{{$data->middlename}}</td>
												<th>{{$data->name_ext}}</th>
												<td>{{$data->gender}}</td>
												<td >
													<a href="{{ url('/employee/'.$data->employee_id)}}">
													<button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" >
													View
													</button>
												</a>
											</td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End Recent Sales -->
				</div>
			</div>
		</div>
	</section>
	<!--/DRE MO PAG DESIGN-->
</main>
<!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection