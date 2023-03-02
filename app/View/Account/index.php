
<head>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <!-- <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" /> -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/account.css" rel="stylesheet" />
</head>

<script type="text/javascript">
  
  //make data editable
  function editNameField(){
   document.getElementById("name").disabled = false;
   if(document.getElementById("name").value==="" || document.getElementById("email").value==="") { 
            document.getElementById('btnChanges').disabled = true; 
        } else { 
            document.getElementById('btnChanges').disabled = false;
        }
  }
 function editEmailField(){
  document.getElementById("email").disabled = false;
  if(document.getElementById("name").value==="" || document.getElementById("email").value==="") { 
            document.getElementById('btnChanges').disabled = true; 
        } else { 
            document.getElementById('btnChanges').disabled = false;
        }
 }
 function success() {
	 if(document.getElementById("name").value==="" || document.getElementById("email").value==="") { 
            document.getElementById('btnChanges').disabled = true; 
        } else { 
            document.getElementById('btnChanges').disabled = false;
        }
  }

  //make it work
  function openDeleteAccountForm() {  
         document.getElementById(`popup-deleteAccountForm`).style.display = "block";
      }
  function closeDeleteUserForm() {
        document.getElementById(`popup-deleteAccountForm`).style.display = "none";
      }
  

</script>
<body>
    <div  class="form-container">    
        <div class="form-horizontal">
          <h2 class="title">Account</h2>

            <a>
                <img class="default-avatar" src="../assets/img/default-avatar.png" /><br>
            </a><br>
            <form method="POST" class="account-info"> 
                <label class="bold">Name: </label>
                <input type="text" name="name" id="name" onkeyup="success()" value="<?= $userName ?>" disabled>
                <button class="fa-solid fa-pen-to-square" type="button" onclick="editNameField()"></button><br>              
                <label class="bold">Email: </label>
                <input type="text" name="email" id="email" onkeyup="success()" value="<?= $userEmail ?>" disabled>
                <button class="fa-solid fa-pen-to-square" type="button" onclick="editEmailField()"></button><br><br>
                <input type="submit" id="btnChanges" name="btnChanges" class="form-control btn grey" value="Save changes" disabled/>
                
                <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/account/changePassword' ? ' active' : '');?>" href="/account/changePassword">
                      <button type="button" class="form-control btn" >Change password</button>
                </a>
            </form>
                <button id="btnDeleteAccount" class="form-control" onclick="openDeleteAccountForm()" >Delete Account</button>
              
    </div>
    </div>


    <!-- are you sure to delete account popup-->
    <div class="blur-bkg" id="popup-deleteAccountForm">
    <div class="form-popup">
      <form method="POST" class="form-container" id="deleteAccountForm-<?= $user->getID()?>">
        <h2 class="centered-text">Are you sure you want to delete your account</h2>
        <input type="submit" name="deleteAccount" class="btn btn-info" value="Yes" />
        <button  type="button" class="btn btn-danger" onclick="closeDeleteUserForm(<?= $user->getID()?>)">No</button>
      </form>
    </div>
    </div>


</body>

