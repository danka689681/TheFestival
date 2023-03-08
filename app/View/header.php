<div>
   <nav class="navbar navbar-expand-lg bg-black">
      <div class="container customized-nav-container">
         <ul class="navbar-nav left-side">
            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/home' ? ' active' : ''); ?>">
               <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">History</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Explore</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Food</a>
            </li>
         </ul>
            <li> <a href="/home"><img id="logo" src="../assets/img/Logo.png" href="/home"></a>
            </li>
         <ul class="navbar-nav right-side">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Festival
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="/history">Stroll Through History</a>
                  <a class="dropdown-item" href="/yummy">Yummy</a>
                  <a class="dropdown-item" href="/dance">Dance</a>
               </div>
            </li>
            <li class="nav-item">
               <i class="fa-solid fa-heart"></i>
            </li>
            <li class="nav-item">
               <i class="fa-solid fa-cart-shopping"></i>
            </li>
            <?php if (isset($_SESSION['User'])) { ?>
               <li class="nav-item dropdown">
                  <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">
                     <i class="fa-solid fa-user"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="/logout">Logout</a>
                  </div>
               </li>
            <?php } else { ?>
               <li class="nav-item">
                  <a class="nav-link" href="/Login">Login</a>
               </li>
            <?php } ?>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  English
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">English</a>
                  <a class="dropdown-item" href="#">Dutch</a>
                  <a class="dropdown-item" href="#">Korean</a>
                  <a class="dropdown-item" href="#">Chinese</a>
               </div>
            </li>
         </ul>
      </div>
</div>
</nav>
</div>
<script>
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/header.css';
   document.head.appendChild(css);
</script>