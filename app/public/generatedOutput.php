<!DOCTYPE html><html lang="en"><!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Visit Haarlem
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../assets/css/admin.css" rel="stylesheet" />
</head>

<body><div class="sidebar"  data-color="<?php echo $color ?>">
   <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
   <div class="logo">
      <a  class="simple-text logo-mini">
      <img src="../assets/img/Logo.png" />
      </a>
      <a href="/" class="simple-text logo-normal">
      Musiva
      </a>
   </div>
   <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin' ? 'active' : '');?>">
            <a href="/admin">
               <i class="fa-solid fa-house"></i>              
               <p>Dashboard</p>
            </a>
         </li>
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin/users' ? 'active' : '');?>">
            <a href="/admin/users">
               <i class="fa-solid fa-user"></i>              
               <p>Users</p>
            </a>
         </li>
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin/visitHaarlem' ? 'active' : '');?>">
            <a href="/admin/visitHaarlem">
               <i class="fa-solid fa-signs-post"></i>             
               <p>Visit Haarlem</p>
            </a>
         </li>
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin/festival' ? 'active' : '');?>">
            <a href="/admin/festival">
               <i class="fa-solid fa-icons fa-fw fa-2x"></i>
               <p>Festival</p>
            </a>
         </li>
         <li class="nav-bottom">
            <a href="">
               <i class="fa-solid fa-right-from-bracket"></i>
               <p>Logout</p>
            </a>
         </li>
      </ul>
   </div>
</div>
<div class="main-panel" id="main-panel">
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
         <div class="navbar-wrapper">
            <div class="navbar-toggle">
               <button type="button" class="navbar-toggler">
               <span class="navbar-toggler-bar bar1"></span>
               <span class="navbar-toggler-bar bar2"></span>
               <span class="navbar-toggler-bar bar3"></span>
               </button>
            </div>
         </div>
      </div>
   </nav>
   <!-- End Navbar -->
   <div class="panel-header-colored">
   </div>
</div>
</div>
<script>
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/admin.css';
   document.head.appendChild(css);
</script>
    <div class="main-panel" id="main-panel">
      <h1 class="centered-text">Visit Haarlem</h1>
    </div>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../assets/css/admin.css" rel="stylesheet" />
</head>

<body>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
</body></body></html>