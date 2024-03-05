<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 May 2022 15:30:29 GMT -->

<head>

    <meta charset="utf-8" />
    <title>connectinskillz | Admindashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Connecting The Dots..." name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/33e65a_3ea4acd8e91d4f64802798c32330dcd3~mv2.png/v1/crop/x_68,y_165,w_284,h_207/fill/w_85,h_62,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled_design__2_-removebg-preview%20(1).png">

    <!-- plugin css -->
    <link href="admindashboard/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="admindashboard/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="admindashboard/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="admindashboard/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="admindashboard/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="admindashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="admindashboard/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="admindashboard/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

</head>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img height="24" src="https://static.wixstatic.com/media/33e65a_3ea4acd8e91d4f64802798c32330dcd3~mv2.png/v1/crop/x_68,y_165,w_284,h_207/fill/w_85,h_62,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled_design__2_-removebg-preview%20(1).png"
                                alt="logo" class="logo1">
                            </span>
                            <span class="logo-lg">
                                <img height="24" src="https://static.wixstatic.com/media/33e65a_3ea4acd8e91d4f64802798c32330dcd3~mv2.png/v1/crop/x_68,y_165,w_284,h_207/fill/w_85,h_62,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled_design__2_-removebg-preview%20(1).png"
                                alt="logo" class="logo1"> <span
                                    class="logo-txt">ConnectinSKillz</span>
                            </span>
                        </a>

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img height="24" src="https://static.wixstatic.com/media/33e65a_3ea4acd8e91d4f64802798c32330dcd3~mv2.png/v1/crop/x_68,y_165,w_284,h_207/fill/w_85,h_62,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled_design__2_-removebg-preview%20(1).png"
                                alt="logo" class="logo1">
                            </span>
                            <span class="logo-lg">
                                <img height="24" src="https://static.wixstatic.com/media/33e65a_3ea4acd8e91d4f64802798c32330dcd3~mv2.png/v1/crop/x_68,y_165,w_284,h_207/fill/w_85,h_62,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled_design__2_-removebg-preview%20(1).png"
                                alt="logo" class="logo1"> <span
                                    class="logo-txt">ConnectinSKillz</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button class="btn btn-primary" type="button"><i
                                    class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon position-relative"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i data-feather="bell" class="icon-lg"></i>
                            <span class="badge bg-danger rounded-pill">5</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div data-simplebar style="max-height: 230px;">
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="admindashboard/images/users/avatar-3.jpg"
                                                class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-sm me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-sm me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="admindashboard/images/users/avatar-6.jpg"
                                                class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item right-bar-toggle me-2">
                            <i data-feather="settings" class="icon-lg"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="admindashboard/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">Olayinka CS.</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"
                                onclick='return confirm("Are you sure you really want to logout?")'><i
                                    class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Menu</li>

                        <li>
                            <a href="#">
                                <i data-feather="home"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="grid"></i>
                                <span data-key="t-apps">User Management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="#">
                                        <span data-key="t-calendar">All Users</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span data-key="t-chat">All Earnings</span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-authentication">Authentication</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="#" data-key="t-login">Login</a></li>
                                <li><a href="#" data-key="t-register">Register</a></li>
                                <li><a href="#" data-key="t-recover-password">Recover Password</a></li>
                            </ul>
                        </li>




                    </ul>

                    <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                        <div class="card-body">
                            <img src="admindashboard/images/giftbox.png" alt="">
                            <div class="mt-4">
                                <h5 class="alertcard-title font-size-16">ConnectinSKillz</h5>
                                <p class="font-size-13">Introducing Referral Programs that makes you earn.</p>
                                {{-- <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Referral Program</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Admin Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registered Users</h4>
                                   
                                </div>
                                <div class="card-body">
                                    <div id="datatable-buttons_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                       
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable-buttons"
                                                    class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed"
                                                    role="grid" aria-describedby="datatable-buttons_info"
                                                    style="width: 1055px;">
                                                    <thead>
                                                        <tr role="row">
                                                           
                                                            
                                                            <th class="sorting sorting_asc" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 164.365px;"
                                                                aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending">
                                                                Name</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 247.365px; display: none;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                Email Address</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 118.365px; display: none;"
                                                                aria-label="Office: activate to sort column ascending">
                                                                Phone Number</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 55.3651px; display: none;"
                                                                aria-label="Age: activate to sort column ascending">Referral Code
                                                            </th>
                                                           
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 101.365px; display: none;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Referral Count
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 101.365px; display: none;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Amount
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-buttons" rowspan="1"
                                                            colspan="1" style="width: 112.365px; display: none;"
                                                            aria-label="Start date: activate to sort column ascending">
                                                            Country</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-buttons" rowspan="1"
                                                                colspan="1" style="width: 101.365px; display: none;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                               Action
                                                            </th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach($users as $key => $user)
                                                             
                                                        <tr class="odd">
                                                           
                                                                
                                                            @if($user->first_name == null)
                                                            <td class="dtr-control sorting_1" tabindex="0"> {{ $user->name }}</td>
                                                            @else
                                                            <td class="dtr-control sorting_1" tabindex="0">{{ $user->first_name }} - {{ $user->last_name }}
                                                            </td>
                                                            @endif
                                                       
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->phone_number }}</td>
                                                            
                                                            <td>{{ $user->country ?? "Not Yet Captured" }}</td>
                                                            <td>{{ $user->referral_count ?? 0 }}</td>
                                                            <td>{{ $user->currency}}{{ $user->referral_count * $user->referral_count }}</td>
                                                            <td>{{ $user->referral_code }}</td>
                                                            <td>
                                                                {{-- <a class='btn btn-info'>More Info</a> --}}
                                                                <a class='btn btn-primary'>User Transactions</a>
                                                                <a class='btn btn-danger'>Delete User</a>
                                                            </td>
                    
                                                        </tr>
                                                        @endforeach
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                            <!-- end cardaa -->
                        </div>

                        <div class="col-md-4">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                        <h5 class="card-title me-2">Referral Summary</h5>
                                        <div style='display:none' id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2">
                                        </div>
                                        <div style='display:none' id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2">
                                        </div>
                                        <div style='display:none' id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2">
                                        </div>
                                        <div style='display:none' id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2">
                                        </div>
                                       
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <div id="wallet-balance" data-colors='["#777aca", "#5156be", "#a8aada"]'
                                                class="apex-charts"></div>
                                        </div>
                                        <div class="col-sm align-self-center">
                                            <div class="mt-4 mt-sm-0">
                                                <div>
                                                    <p class="mb-2"><i
                                                            class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i>
                                                        Total Users</p>
                                                    <h6>{{ count($users) }}</h6>
                                                </div>

                                                <div class="mt-4 pt-2">
                                                    <p class="mb-2"><i
                                                            class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>
                                                        Total Referral Count</p>
                                                    <h6>{{ count($users) }}</h6>
                                                </div>

                                                <div class="mt-4 pt-2">
                                                    <p class="mb-2"><i
                                                            class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i>
                                                        Bonus</p>
                                                    <h6>{{ count($users) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                 
                     

                    </div><!-- end row-->


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © ConnectinSKillz.
                        </div>
                      
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center p-3">

                <h5 class="m-0 me-2">Theme Customizer</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="m-0" />

            <div class="p-4">
                <h6 class="mb-3">Layout</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                    <label class="form-check-label" for="layout-vertical">Vertical</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout" id="layout-horizontal"
                        value="horizontal">
                    <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light"
                        value="light">
                    <label class="form-check-label" for="layout-mode-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild"
                        value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                    <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed"
                        value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                        value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                    <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
                        value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                    <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
                        value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark"
                        onchange="document.body.setAttribute('data-topbar', 'dark')">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                        value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                    <label class="form-check-label" for="sidebar-size-default">Default</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                        value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small"
                        value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
                        value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark"
                        value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand"
                        value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                        value="ltr">
                    <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                        value="rtl">
                    <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                </div>

            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="admindashboard/libs/jquery/jquery.min.js"></script>
    <script src="admindashboard/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admindashboard/libs/metismenu/metisMenu.min.js"></script>
    <script src="admindashboard/libs/simplebar/simplebar.min.js"></script>
    <script src="admindashboard/libs/node-waves/waves.min.js"></script>
    <script src="admindashboard/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="admindashboard/libs/pace-js/pace.min.js"></script>

    <!-- apexcharts -->
    <script src="admindashboard/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Plugins js-->
    <script src="admindashboard/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="admindashboard/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    <!-- dashboard init -->
    <script src="admindashboard/js/pages/dashboard.init.js"></script>

    <script src="admindashboard/js/app.js"></script>

    <script src="admindashboard/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="admindashboard/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="admindashboard/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="admindashboard/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="admindashboard/libs/jszip/jszip.min.js"></script>
    <script src="admindashboard/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="admindashboard/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="admindashboard/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="admindashboard/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="admindashboard/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="admindashboard/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admindashboard/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="admindashboard/js/pages/datatables.init.js"></script>


</body>


<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 May 2022 15:31:17 GMT -->

</html>