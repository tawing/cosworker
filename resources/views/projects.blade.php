@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
@endphp

@if($user != NULL)
	@extends('layouts.layout')
	@section('content')

	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>


	<style>
		#addproject .dataTables_empty{
			display:none;
		}
		.filters{
			display: none;
		}
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
			/* Use media queries to adjust the styles based on screen size */
			@media screen and (max-width: 600px) {
				.child-right {
					padding: 5px;
					font-size: 12px;
				}

			}
			
			@media screen and (max-width: 400px) {
				.child-right {
					padding: 3px;
					font-size: 10px;
				}
			}
	</style>
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
			<a class="nav-link active" href="{{ url('/projects') }}">
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
			<h1 style="font-weight: bold;">Philippine Statistics Authority</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
					<li class="breadcrumb-item active">Projects</li>
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
		<section class="section dashboard">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-12">
							<div class="card recent-sales overflow-auto">
								<div class="card-body parent" >
									<h5 class="card-title">Projects</h5>
									<button type="button" class="btn btn-outline-primary mb-4"data-bs-toggle="modal" data-bs-target="#addproject"><i class="bi bi-plus-square" style="padding-right: 5px;"></i> Add</button>
									<a href="{{ url('/projects-pdf')}}"><button type="button" class="btn btn-outline-info mb-4" ><i class="bi bi-printer" style="padding-right: 5px;"></i>Print</button></a>
									<!-- Modal -->
									<div class="modal fade" id="addproject" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="ModalLabel">Add Project</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<h5 class="card-title mb-4" style="padding: 0px; text-align: left;">Project</h5>
													<!-- Floating Labels Form -->
													<form class="row g-3" action="{{ route('projects.store') }}" method="POST">
														@csrf
														<div class="col-md-6">
															<div class="form-floating">
																<input type="text" class="form-control" id="floatingName" name="projectname" placeholder="Project Name" required>
																<label for="floatingName">Project Name</label>
															</div>
														</div>
														<div class="col-6">
															<div class="form-floating">
																<input type="text" class="form-control"  name="focalperson" placeholder="Focal Person" id="floatingTextarea" required>
																<label for="floatingTextarea">Focal Person</label>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-floating">
																<textarea class="form-control" placeholder="Address" name="description" id="floatingPD" style="height: 100px;" placeholder="Project Duration"></textarea>
																<label for="floatingPD">Project Description</label>
															</div>
														</div>
														<div class="alert alert-warning" role="alert" id="projectPositionAlert" style="display: none;">ADD AT LEAST ONE PROJECT POSITION</div>
														<div class="col-md-12">
															<div class="form-floating">
																<table class="table table-borderless child-right table-responsive" id="positions-table" style="width: 100%;">
																	<thead>
																		<th>ID</th>
																		<th>Position</th>
																		<th>Action</th>
																	</thead>
																	<tbody>
														
																	</tbody>
																</table>
																<button type="button" class="btn btn-primary" id="add-position-btn">Add Position</button>
															</div>
														</div>
														<div class="col-6">
															<div class="form-floating">
																<input type="text" class="form-control" id="floatingDuration" name="duration" placeholder=" Project Duration" required>
																<label for="floatingDuration">Project Duration</label>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-floating mb-3">
																<input type="date" class="form-control" placeholder="StartDate" name="start" id="floatingStartdate" placeholder="Start Date" required>
																<label for="floatingStartdate">Start Date</label>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-floating">
																<input type="date" class="form-control" id="EndDate" name="end" placeholder="End Date" required>
																<label for="floatingEnddate">End Date</label>
															</div>
														</div>
														<div class="col-md-12" style="margin-top: 0px;">
															<div class="form-floating">
																<input type="text" class="form-control" id="floatingCity" name="remarks" placeholder="Remarks">
																<label for="floatingCity">REMARKS</label>
															</div>
														</div>
													
													<!-- End floating Labels Form -->
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-outline-primary">Save</button>
												</div>
												</form>
											</div>
										</div>
									</div>
									<!--/End modal-->
									<table class="table table-borderless datatable child-right table-responsive" id="positions-table" style="width: 100%;">
										<thead>
											<tr>
												<th scope="col">Project ID</th>
												<th scope="col">Project Name</th>
												<th scope="col">Focal Person</th>
												<th scope="col">Project Duration</th>
												<th scope="col">Start Date</th>
												<th scope="col">End Date</th>
												<th scope="col">Total Number of Employees</th>
												<th scope="col">Project Status</th>
												<th scope="col">Remarks</th>
												<th scope="col">Option</th>
											</tr>
										</thead>
										<tbody>
											@foreach($projects as $data)
											<tr>
												<th>{{ $data->project_id }}</th>
												<td>{{ $data->projectname }}</td>
												<td>{{ $data->focalperson }}</td>
												<td>{{ $data->project_duration }}</td>
												<td>{{ $data->start }}</td>
												<td>{{ $data->end }}</td>
												<td>{{ $data->totalperproject }}</td>
												<td><span class="
													@if($data->projstatus_id === 1) badge bg-success 
													@elseif($data->projstatus_id === 2) badge bg-info 
													@elseif($data->projstatus_id === 3) badge bg-warning  @endif">
													@if($data->projstatus_id === 1) Completed
													@elseif($data->projstatus_id === 2) Ongoing
													@elseif($data->projstatus_id === 3) Postponed @endif
													</span>
												</td>
												<td style="max-width: 200px;">{{ $data->project_remarks }}</td>
												<td style="text-align: center;">
													<!-- Button trigger modal -->
													<button type="button" id="projectSelect" class="btn btn-outline-primary" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->project_id }}">
														Update
													</button>
													
													<!-- Modal -->
													<div class="modal fade" id="exampleModal{{ $data->project_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<form id="my-form-{{ $data->project_id }}" >
																	@csrf
																	<input type="hidden" name="project_id" value="{{ $data->project_id }}">
																	<div class="modal-body row g-3" >
																		<!-- Floating Labels Form -->
																		<h5 class="card-title mb-4" style="padding: 0px; text-align: left;">Project</h5>
																			<div class="col-md-6">
																				<div class="form-floating">
																					<input type="text" class="form-control" id="floatingName" placeholder="Project Name" name="projectname" value="{{ $data->projectname }}">
																					<label for="floatingName">Project Name</label>
																				</div>
																			</div>
																			<div class="col-6">
																				<div class="form-floating">
																					<input type="text" class="form-control" placeholder="Focal Person" id="floatingTextarea" name="focalperson" value="{{ $data->focalperson }}">
																					<label for="floatingTextarea">Focal Person</label>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="form-floating">
																					<textarea class="form-control"id="floatingPD" style="height: 100px;" name="project_desc" placeholder="Project Description">{{ $data->project_desc }}</textarea>
																					<label for="floatingPD">Project Description</label>
																				</div>
																			</div>
																			
																			<div class="col-md-12">
																				<div class="table-responsive">
																					<table class="table table-striped" data-project-id="{{ $data->project_id }}">
																						<thead>
																							<tr>
																								<th>Positions</th>
																								<th>Actions</th>
																							</tr>
																						</thead>
																						<tbody>

																							@foreach($project_positions as $row)
																								@if($data->project_id === $row->project_id)

																									<tr>
																										<input type="text" name="project_id" value="{{$row->project_id}}" hidden>
																											<input type="text" name="projposid" value="{{$row->proj_pos_id}}" hidden>
																										<td>
																											<input type="text" class="form-control position-editable readonly" name="positions[]" value="{{ $row->position }}" id="positionname-{{ $row->proj_pos_id }}" data-position-id="{{ $row->proj_pos_id }}" readonly>

																										</td>
																										<td>

																											<button type="button" class="btn btn-primary btn-sm update-position-btn" data-position-id="{{ $row->proj_pos_id }}" data-position-name="{{ $row->position }}" onclick="togglePositionEdit('{{ $row->proj_pos_id }}')">Update Position</button>

																										</td>
																									</tr>
																								@endif
																							@endforeach
																							<tr id="add-position-row">
																							</tr>	
																						</tbody>				
																					</table>		
																				</div>
																			</div>
																			<button type="button" class="btn btn-success btn-sm" onclick="addPosition({{ $data->project_id }})">Add Position</button>

																			<div class="col-6">
																				<div class="form-floating">
																					<input type="text" class="form-control" id="floatingDuration" placeholder=" Project Duration" name="project_duration" value="{{ $data->project_duration }}">
																					<label for="floatingDuration">Project Duration</label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-floating mb-3">
																					<input type="date" class="form-control" placeholder="StartDate" id="start-date-input" placeholder="Start Date" name="start" value="{{ $data->start }}" disabled >
																					<label for="floatingStartdate">Start Date</label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-floating">
																					<input type="date" class="form-control" id="end-date-input" placeholder="End Date" name="end" value="{{ $data->end }}" disabled>
																					<label for="floatingEnddate">End Date</label>
																				</div>
																			</div>
																			<div class="col-md-12" style="margin-top: 0px;">
																				<div class="form-floating">
																					<input type="text" class="form-control" id="floatingCity" placeholder="Remarks" name="remarks" value="{{ $data->project_remarks }}">
																					<label for="floatingCity">REMARKS</label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div style="text-align: left;">
																					<div class="form-check">
																						<input class="form-check-input postponed-checkbox" type="checkbox">
																						<label class="form-check-label" for="gridCheck1">
																							Check if <span style="font-weight: bold; color: rgb(255, 174, 0)">Postponed</span>
																						</label>
																					</div>
																				</div>
																			</div>
																			<!-- End floating Labels Form -->
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-outline-primary">Save Changes</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<a href="{{ url('/list/'.$data->project_id) }}">
													<button type="button" class="btn btn-outline-info" style="padding: 1px 20px 1px">
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


	<script>
		function addPosition(projectId) {
		var table = $('table[data-project-id="' + projectId + '"]');
		var newRow = '<tr><td><input type="text" class="form-control" name="positions[]" value=""></td>' +
					'<td><button type="button" class="btn btn-danger btn-sm delete-position-btn">Delete</button></td></tr>';
		table.find('tbody').append(newRow);
	}
		
		function removePosition(row) {
			$(row).closest('tr').remove();
		}
		</script>
		
	<script>
$(document).ready(function() {
    var positionCount = 0;

    // Bind click event to add position button
    $('#add-position-btn').click(function() {
        positionCount++;

		var newRow = '<tr><td>' + positionCount + '</td><td><input type="text" name="positions[]" placeholder="Position name" required></td><td><button type="button" class="btn btn-danger delete-row-btn">Delete</button></td></tr>';
$('#addproject .modal-body table').append(newRow);
    });

    // Bind click event to delete row button
    $(document).on('click', '.delete-row-btn', function() {
        $(this).closest('tr').remove();
        positionCount--;
    });

    // Bind submit event to form
    $('form').submit(function(event) {
        var positions = [];
        $('#positions-table tbody tr').each(function() {
            var positionName = $(this).find('input[name="positions[]"]').val();
            if (positionName) {
                positions.push(positionName);
            }
        });
        $('input[name="positions"]').val(positions.join(','));
    });
});


$(document).ready(function() {
    $('.postponed-checkbox').on('change', function() {
        var startDateInput = $(this).closest('.form-check').parent().siblings('.col-md-3').find('.start-date-input');
        var endDateInput = $(this).closest('.form-check').parent().siblings('.col-md-3').find('.end-date-input');

        if ($(this).prop('checked')) {
            startDateInput.prop('disabled', true);
            endDateInput.prop('disabled', true);
        } else {
            startDateInput.prop('disabled', false);
            endDateInput.prop('disabled', false);
        }
    });
});

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
				//.eq(0)
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
	//UPDATE POSITION 
		function updatePosition(positionId, newPosition) {
		// Construct the ID of the input field based on the position ID
		var inputId = 'positionname-' + positionId;

		// Get the value of the input field with the constructed ID
		var positionName = $('#' + inputId).val();

		// Send an AJAX request to update the position
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: "POST",
			url: "/projects/posupdate",
			data: {
				position_id: positionId,
				new_position: newPosition,
				position_name: positionName // use the value of the input field
			},
			success: function(response) {
				// Handle the response from the server
				console.log(response)
				
			},
			error: function(jqXHR, textStatus, errorThrown) {
				// Handle any errors that occur during the AJAX request
				console.error(jqXHR.responseText);
			}
		});
	}

		$('.update-position-btn').click(function() {
			// Get the position ID and new position value
			var positionId = $(this).data('position-id');
			var newPosition = $(this).parent().siblings().find('.position-editable').val();

			// Call the updatePosition function
			updatePosition(positionId, newPosition);
		});
		//add position
		$(function() {
    $('form[id^="my-form-"]').submit(function(event) {
        event.preventDefault();

        // Get the project ID from the form ID
        var projectId = $(this).find('input[name="project_id"]').val();
        console.log(projectId);

        // Serialize the form data
        var formData = $(this).serialize();

        // Send an AJAX request to the correct URL for the project
        $.ajax({
            url: '/projects/' + projectId + '/posadd',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle the response from the server
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.log(xhr.responseText);
            }
        });
    });
});

		function togglePositionEdit(positionId) {
			var positionInput = $("#positionname-" + positionId);
			var updateButton = $(".update-position-btn[data-position-id='" + positionId + "']");
			var saveButton = $("button[type='submit']");

			// Toggle the readonly attribute of the position input
			positionInput.prop("readonly", !positionInput.prop("readonly"));

			// Update the text and click event of the update button
			if (positionInput.prop("readonly")) {
				updateButton.text("Update Position");

			} else {
				updateButton.text("Save Position");
				updateButton.off("click").on("click", function() {
					updatePosition(positionId);
				});
			}

			// Check if both buttons are in their specific states and display alert
			if (updateButton.text() === "Save Position" && saveButton.length > 0) {
				saveButton.on("click", function(event) {
					event.preventDefault();
					alert("Please finalize any changes made in the position names and click on 'Save Position' to SAVE your changes.");
				});
			} else {
				saveButton.off("click");
			}
		}

		$('#addproject').on('shown.bs.modal', function () {
    $('#projectPositionAlert').show(); // Show the alert when the modal is displayed
    
    // Hide the alert after 5 seconds
    setTimeout(function() {
      $('#projectPositionAlert').hide();
    }, 10000);
  });
	</script>

		
	
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
 