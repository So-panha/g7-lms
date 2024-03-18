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

  <!-- script query -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
                  <a href="/">
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
                      <div class="user-notification-block align-right d-inline-block">
                        <!-- keep for add notification -->

                        <!-- User notification-->
                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                          <ul class="list-inline m-0">
                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Apply Leave">
                              <a href="/leaves" class="font-23 menu-style text-white align-middle">
                                <span class="lnr lnr-briefcase position-relative"></span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!-- /User notification-->
                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                          <ul class="list-inline m-0">
                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Notivicatiion">
                              <!-- Allow message only admin -->
                              <?php if ($_SESSION['user']['role'] === 'manager') : ?>
                                <a href="/view_alert" class="font-23 menu-style text-white align-middle">

                                  <!-- Call the variable of the messages to show there -->
                                  <script>
                                    // Call function first before call setInterval for alert
                                    displayHello();
                                    // Find a new notificaions of the leaving of employees
                                    setInterval(displayHello,8000);
                                    function displayHello() {
                                      $(document).ready(() => {
                                        var notification = document.getElementById('notification');
                                        $.get("../controllers/alert/notification.controller.php", function(data) {
                                          notification.textContent = data;
                                        })
                                      })
                                    }
                                  </script>

                                  <div class="user-avatar d-inline-block">
                                    <span class="badge badge-danger badge-counter" style="z-index: 1; position: absolute;left: 10%;top: 10%; border-radius:50%" id="notification"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16" style="position: absolute;top:30%;left:0.5%">
                                      <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                    </svg>
                                  </div>
                                </a>
                              <?php endif; ?>
                              <!-- Notifications -->
                              <!-- user info-->
                              <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="menu-style dropdown-toggle">
                                  <div class="user-avatar d-inline-block">
                                    <img src="assets/images/profiles/<?= $_SESSION['user']['picture'] ?>" alt="user avatar" class="rounded-circle img-fluid" width="55px" style="height: 55px;" />
                                  </div>
                                </a>
                                <!-- Notifications -->
                                <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
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