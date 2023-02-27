<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Account Management
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <!-- <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" /> -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/account.css" rel="stylesheet" />


</head>

<?php
    $name = "test user";
    $email = "test@email.com";
?>

<body>
    <div class="form-container">    
        <div class="form-horizontal">
          <h2 class="title">Account</h2>

            <a>
                <img class="default-avatar" src="../assets/img/default-avatar.png" /><br>
            </a><br>
            <div class="account-info"> 
                <label class="bold">Name: </label>
                <input type="text" name="name" value="<?php echo $name ?>" disabled>
                <button class="fa-solid fa-pen-to-square"></button><br>              
                <label class="bold">Email: </label>
                <input type="text" name="email" value="<?php echo $email ?>" disabled>
                <button class="fa-solid fa-pen-to-square"></button><br><br>

                
                    <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/account/changePassword' ? ' active' : '');?>" href="/account/changePassword">
                    <button class="<?php echo ($_SERVER['REQUEST_URI'] == '/account/changePassword' ? ' active' : '');?>">Change password</button>
                    </a>
              
            </div>
        </div>
    </div>



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

</body>

</html>
