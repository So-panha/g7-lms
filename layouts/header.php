<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="vendor/img/favicon.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/css/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="vendor/css/font-awesome.min.css">

  <!-- Select2 CSS -->
  <link rel="stylesheet" href="vendor/plugins/select2/select2.min.css">

  <!-- Select2 CSS -->
  <link rel="stylesheet" href="vendor/plugins/fullcalendar/fullcalendar.min.css">

  <!-- Datetimepicker CSS -->
  <link rel="stylesheet" href="vendor/css/bootstrap-datetimepicker.min.css">

  <!-- Linearicon Font -->
  <link rel="stylesheet" href="vendor/css/lnr-icon.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="vendor/css/style.css" />

  <!-- script login password -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

  <title>LMS SYSTEM</title>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="vendor/js/html5shiv.min.js"></script>
      <script src="vendor/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- Loader -->
  <div id="loader-wrapper">
    <div class="loader">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>
  <?php if (!empty($_SESSION['user'])) : ?>
    <!-- Inner wrapper -->
    <div class="inner-wrapper">
      <!-- Header -->
      <header class="header">
        <!-- Top Header Section -->
        <div class="top-header-section">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                <div class="logo my-3 my-sm-0">
                  <a href="index.html">
                    <!-- <img
                      src="assets/img/logo.png"
                      alt="logo image"
                      class="img-fluid"
                      width="100"
                    /> -->
                    <h3 class="text-white">LOGO</h3>
                  </a>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                <div class="user-block d-none d-lg-block">
                  <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div
                        class="user-notification-block align-right d-inline-block"
                      >
                      <!-- keep for add notification -->
                     
                      <!-- User notification-->
                      <div
                          class="user-info align-right dropdown d-inline-block header-dropdown"
                      >
                      <ul class="list-inline m-0">
                          <li
                            class="list-inline-item"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Apply Leave"
                          >
                            <a
                              href="leave.html"
                              class="font-23 menu-style text-white align-middle"
                            >
                              <span
                                class="lnr lnr-briefcase position-relative"
                              ></span>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <!-- /User notification-->
                      <div
                          class="user-info align-right dropdown d-inline-block header-dropdown"
                      >
                      <ul class="list-inline m-0">
                          <li
                            class="list-inline-item"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="View Notivicatiion"
                          >
                            <a
                              href="/view_alert"
                              class="font-23 menu-style text-white align-middle"
                            >
                          <div class="user-avatar d-inline-block" >
                            <span class="badge badge-danger badge-counter" style="z-index: 1; position: absolute;left: 21%;top: 10%; border-radius:50%">7+</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" fill="currentColor" class="bi bi-envelope text-white"  viewBox="0 0 20 20" >
                              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                          </div>
                        </a>
                      <!-- Notifications -->
                      <!-- user info-->
                      <div
                        class="user-info align-right dropdown d-inline-block header-dropdown"
                      >
                        <a
                          href="javascript:void(0)"
                          data-toggle="dropdown"
                          class="menu-style dropdown-toggle"
                        >
                          <div class="user-avatar d-inline-block">
                            <img
                              src="assets/images/profiles/img-2.jpg"
                              alt="user avatar"
                              class="rounded-circle img-fluid"
                              width="55"
                            />
                          </div>
                        </a>
                        <!-- Notifications -->
                        <div
                          class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right"
                        >
                          <a class="dropdown-item p-2" href="/user_profile">
                            <span class="media align-items-center">
                              <span class="lnr lnr-user mr-3"></span>
                              <span class="media-body text-truncate">
                                <span class="text-truncate">Profile</span>
                              </span>
                            </span>
                          </a>
                          <a class="dropdown-item p-2" href="settings.html">
                            <span class="media align-items-center">
                              <span class="lnr lnr-cog mr-3"></span>
                              <span class="media-body text-truncate">
                                <span class="text-truncate">Settings</span>
                              </span>
                            </span>
                          </a>
                          <a class="dropdown-item p-2" href="../controllers/logout/logout.controller.php">
                            <span class="media align-items-center">
                              <span class="lnr lnr-power-switch mr-3"></span>
                              <span class="media-body text-truncate">
                                <span class="text-truncate">Logout</span>
                              </span>
                            </span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="d-block d-lg-none">
                      <a href="javascript:void(0)">
                        <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                      </a>
                    <?php endif; ?>