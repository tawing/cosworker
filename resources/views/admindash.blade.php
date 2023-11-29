<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard | PSA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../assets/img/PSA.png" />
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="frontend\style.css">

  <!-- Template Main CSS File -->
  <link href="../frontend/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

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
            
            <li><hr class="dropdown-divider"></li>
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
                <a href="{{ url('/cetificate_log') }}">
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
          <a class="nav-link collapsed" href="{{ url('/upload') }}">
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
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

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
                      <a href="active.html"><h6>145</h6></a>

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
                      <a href="inactive.html"><h6>342</h6></a>

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
                      <a href="Employee.html"><h6>42069</h6></a>

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
                        <a href="certificatelogs.html"><h6>520</h6></a>  
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div>

              <!-- Blacklist Card -->
            <div class="col-xxl-6 col-xl-12">

                <div class="card info-card customers-card">            
  
                  <div class="card-body">
                    <h5 class="card-title">Blocklist</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #ffe3e8dc; color: #da2958;">
                        <i class="bi bi-person-x"></i>
                      </div>
                      <div class="ps-3">
                        <a href="Blacklist.html"><h6>1244</h6></a>
  
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div><!-- End Customers Card -->

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
                     
                        <th scope="col">Status</th>
                        <th scope="col">Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>04-20-2000 | 14:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename

                        </a></td>
                        
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- View only -->
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Request for Blocklist</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="col-12">
                      
                                        <h5 class="card-title mb-4" style="padding: 0px;">Employee Profile</h5>
                      
                                        <form class="forms-sample">
                      
                                          <div class="form-row d-flex">
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>LAST NAME</label>
                                              <input type="text" class="form-control mt-2" value="Galia" placeholder="Lastname" name="last_name" readonly>
                                            </div>
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>FIRST NAME</label>
                                              <input type="text" class="form-control mt-2" value="Lance Lawrence" placeholder="Firstname" name="first_name" readonly>
                                            </div>
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>MIDDLE NAME</label>
                                              <input type="text" class="form-control mt-2" value="Lozada" placeholder="Middlename" name="middle_name" readonly>
                                            </div>
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>SUFFIX</label>
                                              <input type="text" class="form-control mt-2" placeholder="Suffix" name="suffix" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-6" style="padding: 5px;">
                                              <label>EDUCATIONAL ATTAINMENT</label>
                                              <div class="col-sm-12">
                                                <select class="form-select mt-2" aria-label="Default select example" disabled>
                                                  <option >Open this select menu</option>
                                                  <option selected value="1">One</option>
                                                  <option value="2">Two</option>
                                                  <option value="3">Three</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group col-md-6" style="padding: 5px;">
                                              <label>ELIGIBILITY</label>
                                              <input type="text" class="form-control mt-2" value="Doctor's Degree Celcius" placeholder="Eligibility" name="eligibility" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-2" style="padding: 5px;">
                                              <label>BIRTHDAY</label>
                                              <input type="date" class="form-control mt-2" placeholder="Birthday" name="birthday" readonly>
                                            </div>
                                            <div class="form-group col-md-2" style="padding: 5px;">
                                              <label>SEX</label>
                                              <input type="text" class="form-control mt-2" value="Yes" placeholder="Sex" name="sex" readonly>
                                            </div>
                                            <div class="form-group col-md-8" style="padding: 5px;">
                                              <label>ADDRESS</label>
                                              <input type="text" class="form-control mt-2" value="Barra Macabalan CDOC" placeholder="Address" name="address" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-4" style="padding: 5px;">
                                              <label>CONTACT NUMBER</label>
                                              <input type="text" class="form-control mt-2" value="09565734197" placeholder="Contact Number" name="contact" readonly>
                                            </div>
                                            <div class="form-group col-md-4" style="padding: 5px;">
                                              <label>EMAIL</label>
                                              <input type="email" class="form-control mt-2" value="lancelawrencegalia@gmail.com" placeholder="Email" name="email" readonly>
                                            </div>
                                            <div class="form-group col-md-4" style="padding: 5px;">
                                              <label>MARITAL STATUS</label>
                                              <input type="text" class="form-control mt-2" value="Tekken 7" placeholder="Marital Status" name="marital_status" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-5" style="padding: 5px;">
                                              <label style="color: red;">IF BLOCKLIST</label>
                                              <div class="col-sm-12">
                                                <select class="form-select mt-2" aria-label="Default select example" disabled>
                                                  <option >Open this select menu</option>
                                                  <option value="1">Pending Case</option>
                                                  <option selected value="2">Terminated</option>
                                                  <option value="3">Resigned</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group col-md-7" style="padding: 5px;">
                                              <label>REMARKS</label>
                                              <div class="col-sm-12">
                                                <textarea class="form-control mt-2" style="height: 100px" readonly>Ok</textarea>
                                              </div>
                                            </div>
                                          </div>      
                                          
                                          <hr>

                                          <h5 class="card-title mb-4" style="padding: 0px;">Project</h5>

                                          <!-- Table with hoverable rows -->
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col">Project Name</th>
                                                <th scope="col">Date Start</th>
                                                <th scope="col">Date End</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Remarks</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">ProjectZ</th>
                                                <td>1/1/2000</td>
                                                <td>2/2/2000</td>
                                                <td>Ambot</td>
                                                <td>Ok</td>
                                              </tr>                                            
                                            </tbody>
                                          </table>
                                          
                                        </form>
                      
                                      <!-- </div> -->
                      
                                    <!-- </div> -->
                                  </div><!-- End Recent Sales -->
        
        
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-outline-danger">Reject</button>
                                  <button type="button" class="btn btn-outline-success">Approve</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>04-18-2000 | 12:33</td>
                        <td><a href="#" class="text-primary">Certificate $employeename

                        </a></td>
                        
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <a href="Employeeprofile.html"><button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px">
                            View
                          </button></a>

                          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Request for Certificate of Employment</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="col-12">
                      
                                        <h5 class="card-title mb-4" style="padding: 0px;">Employee Profile</h5>
                      
                                        <form class="forms-sample">
                      
                                          <div class="form-row d-flex">
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>LAST NAME</label>
                                              <input type="text" class="form-control mt-2" value="Galia" placeholder="Lastname" name="last_name" readonly>
                                            </div>
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>FIRST NAME</label>
                                              <input type="text" class="form-control mt-2" value="Lance Lawrence" placeholder="Firstname" name="first_name" readonly>
                                            </div>
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>MIDDLE NAME</label>
                                              <input type="text" class="form-control mt-2" value="Lozada" placeholder="Middlename" name="middle_name" readonly>
                                            </div>
                                            <div class="form-group col-md-3" style="padding: 5px;">
                                              <label>SUFFIX</label>
                                              <input type="text" class="form-control mt-2" placeholder="Suffix" name="suffix" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-6" style="padding: 5px;">
                                              <label>EDUCATIONAL ATTAINMENT</label>
                                              <div class="col-sm-12">
                                                <select class="form-select mt-2" aria-label="Default select example" disabled>
                                                  <option >Open this select menu</option>
                                                  <option selected value="1">One</option>
                                                  <option value="2">Two</option>
                                                  <option value="3">Three</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group col-md-6" style="padding: 5px;">
                                              <label>ELIGIBILITY</label>
                                              <input type="text" class="form-control mt-2" value="Doctor's Degree Celcius" placeholder="Eligibility" name="eligibility" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-2" style="padding: 5px;">
                                              <label>BIRTHDAY</label>
                                              <input type="date" class="form-control mt-2" placeholder="Birthday" name="birthday" readonly>
                                            </div>
                                            <div class="form-group col-md-2" style="padding: 5px;">
                                              <label>SEX</label>
                                              <input type="text" class="form-control mt-2" value="Yes" placeholder="Sex" name="sex" readonly>
                                            </div>
                                            <div class="form-group col-md-8" style="padding: 5px;">
                                              <label>ADDRESS</label>
                                              <input type="text" class="form-control mt-2" value="Barra Macabalan CDOC" placeholder="Address" name="address" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-4" style="padding: 5px;">
                                              <label>CONTACT NUMBER</label>
                                              <input type="text" class="form-control mt-2" value="09565734197" placeholder="Contact Number" name="contact" readonly>
                                            </div>
                                            <div class="form-group col-md-4" style="padding: 5px;">
                                              <label>EMAIL</label>
                                              <input type="email" class="form-control mt-2" value="lancelawrencegalia@gmail.com" placeholder="Email" name="email" readonly>
                                            </div>
                                            <div class="form-group col-md-4" style="padding: 5px;">
                                              <label>MARITAL STATUS</label>
                                              <input type="text" class="form-control mt-2" value="Tekken 7" placeholder="Marital Status" name="marital_status" readonly>
                                            </div>
                                          </div>
                      
                                          <div class="form-row d-flex mt-2">
                                            <div class="form-group col-md-5" style="padding: 5px;">
                                              <label style="color: red;">SELECT IF BLOCKLIST</label>
                                              <div class="col-sm-12">
                                                <select class="form-select mt-2" aria-label="Default select example" disabled>
                                                  <option >Open this select menu</option>
                                                  <option value="1">Pending Case</option>
                                                  <option selected value="2">Terminated</option>
                                                  <option value="3">Resigned</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group col-md-7" style="padding: 5px;">
                                              <label>REMARKS</label>
                                              <div class="col-sm-12">
                                                <textarea class="form-control mt-2" style="height: 100px" readonly>Ok</textarea>
                                              </div>
                                            </div>
                                          </div>  
                                                                                    
                                          <hr>

                                          <h5 class="card-title mb-4" style="padding: 0px;">Project</h5>

                                          <!-- Table with hoverable rows -->
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col">Project Name</th>
                                                <th scope="col">Date Start</th>
                                                <th scope="col">Date End</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Remarks</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">ProjectZ</th>
                                                <td>1/1/2000</td>
                                                <td>2/2/2000</td>
                                                <td>Ambot</td>
                                                <td>Ok</td>
                                              </tr>                                            
                                            </tbody>
                                          </table>                                                                                                                                         
                                          
                                        </form>
                      
                                      <!-- </div> -->
                      
                                    <!-- </div> -->
                                  </div><!-- End Recent Sales -->
        
        
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-outline-danger">Reject</button>
                                  <button type="button" class="btn btn-outline-success">Approve</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>04-18-2000 | 14:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                      
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>


                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>04-17-2000 | 15:15</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                       
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>04-15-2000 | 09:15</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                        
                        <td><span class="badge bg-danger">Rejected</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>04-15-2000 | 14:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                       
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>04-15-2000 | 10:09</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                       
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>04-13-2000 | 11:11</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                      
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>04-10-2000 | 08:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                       
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>04-09-2000 | 14:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                        
                        <td><span class="badge bg-danger">Rejected</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>04-09-2000 | 18:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                        
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>04-07-2000 | 12:10</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                       
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>04-05-2000 | 10:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                       
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>


                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>04-05-2000 | 08:56</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                        
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>


                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>04-02-2000 | 14:18</td>
                        <td><a href="#" class="text-primary">Blocklist $employeename
                        </a></td>
                        
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-info" style="padding: 1px 10px 1px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                          </button>

                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Blacklist Approval -->

              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Certificate Printed Chart</h5>
      
                    <!-- Bar Chart -->
                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChart'), {
                          type: 'bar',
                          data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
                            datasets: [{
                              label: '# of Certificates claimed',
                              data: [10, 59, 80, 100, 80, 55, 40,60, 89,90,69,43],
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
                    <!-- End Bar CHart -->
      
                  </div>
                </div>
              </div>

                      


            

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card" style="height: 1307px;">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity" style="overflow:scroll; height: 1200px;">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->
                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->
                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->
                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->
                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->
                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">added a new employee named</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">is requesting to blocklist</a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">viewed the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark">edited the profile of </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    KaFreddie <a href="#" class="fw-bold text-dark"> deactivated </a>  $firstname$midname$lastname
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

                  

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

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

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>