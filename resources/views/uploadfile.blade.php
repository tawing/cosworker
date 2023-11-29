@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
@endphp


@extends('layouts.layout')
@section('content')
<script>


</script>

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
    .readonly-input {
    background-color: #d7d7d7;
    color: #757d83;
    cursor: not-allowed;
  }

  </style>

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
            <li class="nav-item active">
              <a class="nav-link " href="{{ url('/uploadfile') }}">
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
          <li class="breadcrumb-item active">Upload File</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!--DRE MO PAG DESIGN-->
    <section class="section dashboard">

    @if($message == "success")
        <div id="success-alert" class="alert alert-success" role="alert">PROFILES UPLOADED SUCCESSFULLY</div>
    @endif

    @if(!empty($exist))
        <div id="warning-alert" class="alert alert-warning" role="alert">WARNING: DUPLICATE DATA DETECTED, UPDATE & SAVE THE DUPLICATE DATA OR IGNORE DUPLICATE</div>
    @endif
    
      <div class="row">
        <div class="col-lg-8">
            <div class="row">
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body parent" >
                  <h5 class="card-title">Upload File</h5>
                  
                  <a href="{{ route('downloadTemplate') }}">
                      <button type="button" class="btn btn-outline-success mb-3">
                          <i class="ri-file-excel-2-fill" style="padding-right: 5px;"></i>Download Sample Template
                      </button>
                  </a>
                  <!-- kanang p above, ayha nanaa siya mo show pag naka hover ang user sa upload file -->
      
                  <table class="table table-borderless datatable child-right" id="example" style="width: 100%;">
                    <thead>
                      <tr>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Marital Status</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Eligibility</th>
                        <th scope="col">Educational Attainment</th>
                        <th scope="col">Actions</th> <!-- New column for edit button -->
                      </tr>
                    </thead>
                    <tbody>
                    @if(isset($duplicateRows) && isset($exist))
                      @foreach($duplicateRows as $index => $emp)
                          
                          <tr class="highlight-row" data-row-id="{{ $index }}">
                              @foreach($emp as $value)
                                  <td>{{ $value }}</td>
                              @endforeach
                              <td>
                          <button class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-row-index="{{ $index }}" data-educ-attainment="{{ $emp['11'] }}">Edit</button>
                                                
                        </td>
                      </tr>
                          @php
                              $employeeExistData = $exist[$index]; // Get the corresponding exist data for the current iteration
                          @endphp
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  <!-- Modal for edit form -->
                  @if(isset($duplicateRows) && isset($exist))
                  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="updateForm" class="forms-sample" action="{{ route('uploadfile.update') }}" method="POST">
                            @csrf
                            
                            <!-- Your edit form goes here -->
                            <!-- Add the necessary form fields for editing -->
                            <div class="row g-3">
                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="text" class="form-control mt-2" id="lastnameInput" name="table_lastname" placeholder="Last Name" value="">
                                  <label for="lastnameInput">Last Name</label>
                                  @error('lastname')
                                  <div class="alert alert-danger" role="alert">
                                    INPUT REQUIRED: A-Z
                                  </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="text" class="form-control mt-2" id="firstnameInput" name="table_firstname" placeholder="First Name" value="">
                                  <label for="firstnameInput">First Name</label>
                                  @error('firstname')
                                  <div class="alert alert-danger" role="alert">
                                    INPUT REQUIRED: A-Z
                                  </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="text" class="form-control mt-2" id="middlenameInput" name="table_middlename" placeholder="Middle Name" value="">
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
                                  <input type="text" class="form-control mt-2" id="suffixInput" name="table_ressuffix" placeholder="Suffix" value="">
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
                                    <select class="form-select" id="educSelect" name="table_educ" aria-label="State">
                                      @foreach($educ as $data)
                                      <option>{{$data->educ_name}}</option>
                                      @endforeach
                                    </select>
                                    <label for="floatingSelect">Educational Attainment</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="eligibilityInput" name="table_eligibility" placeholder="Eligibility" value="">
                                    <label for="floatingName">Eligibility</label>
                                  </div>
                                </div>
                              </div>
          
                              <div class="row g-3">
                                <div class="col-md-2">
                                  <div class="form-floating">
                                    <input type="date" class="form-control mt-3" id="bdayInput" name="table_bday" placeholder="Birthday" value="">
                                    <label for="floatingName">Birthday</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="sexInput" name="table_sex" placeholder="Sex" value="">
                                    <label for="floatingName">Sex</label>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="addressInput" name="table_address" placeholder="Addresss" value="">
                                    <label for="floatingName">Address</label>
                                  </div>
                                </div>
                              </div>
          
                              <div class="row g-3">
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="contactInput" name="table_contactno" placeholder="Contact Number" value="">
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
                                    <input type="email" class="form-control mt-3" id="emailInput" name="table_email" placeholder="Email" value="">
                                    <label for="floatingName">Email</label>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="maritalStatusInput" name="table_mstatus" placeholder="Marital Status" value="">
                                    <label for="floatingName">Marital Status</label>
                                  </div>
                                </div>
                              </div>

                              <div class="row g-3">
                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="floatingName" name="table_tinno" placeholder="Tin Number">
                                    <label for="floatingName">Tin No.</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3" id="floatingEmail" name="table_agencyempno" placeholder="Agency Employee Number">
                                    <label for="floatingName">Agency Employee No.</label>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">IGNORE DUPLICATE</button>
                                  <button type="submit" class="btn btn-primary">UPDATE DETAILS TO EXISTING PROFILE</button>
                                </div>
                                <!--DB DATA-->
                              <hr>
                              </form>
                              @if(isset($employeeExistData))
                              <input type="text" id="eemployeeid" name="employeeid" value="{{ $employeeExistData->employee_id }}" hidden>

                              <div class="row g-3">
                                <h6 class="modal-title" id="editModalLabel">Conflicting/Existing Data IN the Database</h6>
                              <div class="col-md-3"> 
                                <div class="form-floating">
                                  <input type="text" class="form-control mt-2 readonly-input" id="elastnameInput" name="lastname" placeholder="Last Name" value="" readonly>
                                  <label for="lastnameInput">Last Name</label>
                                  @error('lastname')
                                  <div class="alert alert-danger" role="alert">
                                    INPUT REQUIRED: A-Z
                                  </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="text" class="form-control mt-2 readonly-input" id="efirstnameInput" name="firstname" placeholder="First Name" value="" readonly>
                                  <label for="firstnameInput">First Name</label>
                                  @error('firstname')
                                  <div class="alert alert-danger" role="alert">
                                    INPUT REQUIRED: A-Z
                                  </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="text" class="form-control mt-2 readonly-input" id="emiddlenameInput" name="middlename" placeholder="Middle Name" value="{{$employeeExistData->middlename}}" readonly>
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
                                  <input type="text" class="form-control mt-2 readonly-input" id="esuffixInput" name="ressuffix" placeholder="Suffix" value="{{$employeeExistData->name_ext}}" readonly>
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
                                  <input type="text" class="form-control mt-3 readonly-input" id="eeducInput" name="educattain" placeholder="Educational Attainment" value="{{$employeeExistData->educ_name}}" readonly>
                                    <label for="floatingSelect">Educational Attainment</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="eeligibilityInput" name="eligibility" placeholder="Eligibility" value="{{$employeeExistData->eligibility}}" readonly>
                                    <label for="floatingName">Eligibility</label>
                                  </div>
                                </div>
                              </div>
          
                              <div class="row g-3">
                                <div class="col-md-2">
                                  <div class="form-floating">
                                    <input type="date" class="form-control mt-3 readonly-input" id="ebdayInput" name="bday" placeholder="Birthday" value="{{$employeeExistData->birthdate}}" readonly>
                                    <label for="floatingName">Birthday</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="esexInput" name="sex" placeholder="Sex" value="{{$employeeExistData->gender}}" readonly>
                                    <label for="floatingName">Sex</label>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="eaddressInput" name="address" placeholder="Addresss" value="{{$employeeExistData->address}}" readonly>
                                    <label for="floatingName">Address</label>
                                  </div>
                                </div>
                              </div>
          
                              <div class="row g-3">
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="econtactInput" name="contactno" placeholder="Contact Number" value="{{$employeeExistData->contact_no}}" readonly>
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
                                    <input type="email" class="form-control mt-3 readonly-input" id="eemailInput" name="email" placeholder="Email" value="{{$employeeExistData->email}}" readonly>
                                    <label for="floatingName">Email</label>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="emaritalStatusInput" name="mstatus" placeholder="Marital Status" value="{{$employeeExistData->marital_status}}" readonly>
                                    <label for="floatingName">Marital Status</label>
                                  </div>
                                </div>
                              </div>

                              <div class="row g-3">
                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="etinnum" name="tinno" placeholder="Tin Number" value="{{$employeeExistData->tin_no}}" readonly>
                                    <label for="floatingName">Tin No.</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control mt-3 readonly-input" id="eagencyempno" name="agencyempno" placeholder="Agency Employee Number" value="{{$employeeExistData->agencyemp_no}}" readonly>
                                    <label for="floatingName">Agency Employee No.</label>
                                  </div>
                                </div>
                              <!-- Add the rest of the input fields here -->
                            </div>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">           

            <div class="card-body">
              <h5 class="card-title">Upload CSV</h5>

              <form action="{{ route('uploadfile.upload') }}" method="POST" enctype="multipart/form-data">
                      @csrf 
                      @method('POST')
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-form-label mb-2">File Upload</label>
                        <div class="col-sm-12">
                          <input class="form-control" type="file" id="formFile" name="csv_file">
                        </div>
                      </div>
                      <button type="submit"class="btn btn-outline-success mt-2"style="padding: 6px 20px 6px">Upload</button>
                    </form>


              
            </div><!-- End Budget Report -->

          </div>

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
         
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Uploads </h5>

              <div class="activity" style="overflow:scroll; height: 500px;">
                @foreach($logs as $key=>$data)
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$elapsed[$key]}}</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  
                  <div class="activity-content">
                  <strong>Admin_{{$data->lastname}}</strong> uploaded <strong>{{$data->filename}}</strong> with <strong>{{$data->totalemp}}</strong> new records
                  </div>
                </div><!-- End activity item-->
                @endforeach
              </div>

            </div>
          </div><!-- End Recent Activity -->
        </div>

        
    </section>
    

    <!--/DRE MO PAG DESIGN-->
  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
    
    $.fn.dataTable.ext.errMode = function(settings, tn, msg) {
  };


      $(document).ready(function () {
      // Setup - add a text input to each footer cell
      $('#example thead tr')

      .clone(true)
      .addClass('filters')
      .appendTo('#example thead');

  var table = $('#example').DataTable({
    
    "bShowWarnings": false,
      "searching": true,
      "paging":   false,
      "ordering": false,
      "info":     false,
      scrollX: true,
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

  </script>
  <script>
  $(document).ready(function() {
  // Add a click event listener to the edit buttons
  $('.edit-button').click(function() {
  // Retrieve the row data from the button data attribute
  var rowData = JSON.parse($(this).attr('data-row'));

  // Get the full name from the first and last names
  var fullName = rowData[1] + ' ' + rowData[0];

  // Split the full name into separate name parts
  var nameParts = fullName.split(' ');

  // Populate the modal fields with the row data
  $('#first-name-input').val(nameParts[0]);
  $('#last-name-input').val(nameParts[1]);
  $('#middle-name-input').val(rowData[2]);
  $('#suffix-input').val(rowData[3]);
  $('#gender-input').val(rowData[4]);
  $('#birthdate-input').val(rowData[5]);

  // Show the modal
  $('#edit-modal').modal('show');
  });


  });

  $('#edit-form').submit(function (event) {
  console.log('Form submitted');
  event.preventDefault();

  axios({
  method: $(this).attr('method'),
  url: $(this).attr('action'),
  data: $(this).serialize()
  })
  .then(function (response) {
  $('#edit-modal').modal('hide');
  $('#edit-form')[0].reset();
  })
  .catch(function (error) {
  console.log(error);
  });
  });
//EDIT button
  $('#edit-modal [data-bs-dismiss="modal"]').click(function () {
  $('#edit-form')[0].reset();
  });

  $(document).ready(function() {
  $('.edit-btn').click(function() {
    var rowIndex = $(this).data('row-index');
    var row = $('#example tbody tr').eq(rowIndex);
    
    // Get the values from the row
    var lastName = row.find('td').eq(0).text();
    var firstName = row.find('td').eq(1).text();
    var middleName = row.find('td').eq(2).text();
    var suffix = row.find('td').eq(3).text();
    var sex = row.find('td').eq(4).text();
    var marital = row.find('td').eq(5).text();
    var bday = row.find('td').eq(6).text();
    var address = row.find('td').eq(7).text();
    var contact = row.find('td').eq(8).text();
    var email = row.find('td').eq(9).text();
    var eligibility = row.find('td').eq(10).text();
    var educAttainment = $(this).data('educ-attainment'); // Get the educational attainment value
    
    var parts = bday.split('/'); // Split the date string
    var formattedDate = parts[0] + '-' + parts[1] + '-' + parts[2];
    // Add more variables for other input fields

    // Populate the modal inputs with the values
    $('#lastnameInput').val(lastName);
    $('#firstnameInput').val(firstName);
    $('#middlenameInput').val(middleName);
    $('#suffixInput').val(suffix);
    $('#sexInput').val(sex);
    $('#maritalStatusInput').val(marital);
    $('#bdayInput').val(formattedDate);
    $('#addressInput').val(address);
    $('#contactInput').val(contact);
    $('#emailInput').val(email);
    $('#eligibilityInput').val(eligibility);

    // Set the selected value in the select option
    $('#educSelect').val(educAttainment);

    // Add more lines for other input fields
  });
});

  //employeeexist
  document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("editModal");
        modal.addEventListener("show.bs.modal", function(event) {
            const button = event.relatedTarget;
            const rowIndex = button.getAttribute("data-row-index");
            const educAttainment = button.getAttribute("data-educ-attainment");
            const employee = {!! json_encode($exist) !!}[rowIndex];
            
            // Populate the form fields with the corresponding employee data
            document.getElementById("eemployeeid").value = employee.employee_id;
            document.getElementById("elastnameInput").value = employee.lastname;
            document.getElementById("efirstnameInput").value = employee.firstname;
            document.getElementById("emiddlenameInput").value = employee.middlename;
            document.getElementById("esuffixInput").value = employee.name_ext;
            document.getElementById("eeducInput").value = employee.educ_name;
            document.getElementById("eeligibilityInput").value = employee.eligibility;
            document.getElementById("ebdayInput").value = employee.birthdate;
            document.getElementById("esexInput").value = employee.gender;
            document.getElementById("eaddressInput").value = employee.address;
            document.getElementById("econtactInput").value = employee.contact_no;
            document.getElementById("emaritalStatusInput").value = employee.marital_status;
            document.getElementById("etinnum").value = employee.tin_no;
            document.getElementById("eagencyempno").value = employee.agencyemp_no;
            document.getElementById("eemailInput").value = employee.email;
           
            // Populate other form fields accordingly
            
            // Update the form action URL if needed
            document.getElementById("updateForm").action = "{{ route('employee.update') }}";
        });
    });

    //WHEN UPDATING
    $(document).ready(function() {
// Listen for the form submission event
$('#updateForm').submit(function(event) {
  event.preventDefault(); // Prevent the default form submission behavior

  // Create a new FormData object
  var formData = new FormData(this);
  
  // Send an AJAX request
  $.ajax({
    url: "{{ route('uploadfile.update') }}",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      console.log(response); // Log the entire response object
      Swal.fire({
      title: 'Success',
      text: 'Update successful',
      icon: 'success',
      showConfirmButton: false,
      timer: 2500 // Adjust the duration of the pop-up message
    });
        },
    error: function (xhr, status, error) {
      // Handle error response
      console.log(xhr);
      console.log(status);
      console.log(error);
    }
  });
});
  });

   // Delay in milliseconds (adjust as needed)
   var delay = 5500;

// Hide the success alert after the delay
setTimeout(function() {
    $('#success-alert').fadeOut();
}, delay);

// Hide the warning alert after the delay
setTimeout(function() {
    $('#warning-alert').fadeOut();
}, delay);
  </script>
@endsection

