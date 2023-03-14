<div class="sidebar"  data-color="<?php echo $color ?>">
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
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin' || $_SERVER['REQUEST_URI'] == '/admin/' ? 'active' : '');?>">
            <a href="/admin">
               <i class="fa-solid fa-house"></i>              
               <p>Dashboard</p>
            </a>
         </li>
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin/users' || $_SERVER['REQUEST_URI'] == '/admin/users/' ? 'active' : '');?>">
            <a href="/admin/users">
               <i class="fa-solid fa-user"></i>              
               <p>Users</p>
            </a>
         </li>
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin/visitHaarlem' || $_SERVER['REQUEST_URI'] == '/admin/visitHaarlem/' ? 'active' : '');?>">
            <a href="/admin/visitHaarlem">
               <i class="fa-solid fa-signs-post"></i>             
               <p>Visit Haarlem</p>
            </a>
         </li>
         <li>
            <p class="navHeading">Festival</p>
            <hr class="navSeparator">
         </li>
         <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/admin/dance' || $_SERVER['REQUEST_URI'] == '/admin/dance/'  ? 'active' : '');?>">
            <a href="/admin/dance">
               <i class="fa-solid fa-icons fa-fw fa-2x"></i>
               <p>Dance</p>
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