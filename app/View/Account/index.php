  <div class="content">
      <div class="card-body form-container" style="width: 50rem;">
      
        <h2 class="card-title">Account</h2>
          <a>
            <img class="default-avatar" src="../assets/img/default-avatar.png" /><br><br>
          </a>
          <form method="POST" class="account-info"> 
            <label class="bold">Name: </label>
            <input type="text" name="name" id="name" onkeyup="btnChangedisable()" value="<?= $userName ?>" readOnly="true">
            <button type="button" rel="tooltip"  class="btn btn-info btn-sm btn-icon" onclick="editNameField()">
              <i class="fa-light fa-pen-to-square fa-margin"></i>
            </button><br>              
            <label class="bold">Email: </label>
            <input type="text" name="email" id="email" onkeyup="btnChangedisable()" value="<?= $userEmail ?>" readOnly="true">
            <button type="button" rel="tooltip"  class="btn btn-info btn-sm btn-icon" onclick="editEmailField()">
              <i class="fa-light fa-pen-to-square fa-margin"></i>
            </button><br>
            <input type="submit" id="btnChanges" name="btnChanges" class="btn blue" value="Save changes" disabled/>
               
            <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/account/changePassword' ? ' active' : '');?>" href="/account/changePassword">
              <button type="button" class="btn blue" >Change password</button>
            </a>
          </form>
          <button id="btnDeleteAccount" class="btn" onclick="openDeleteAccountForm()" >Delete Account</button>
      </div>
  </div>

<script>
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/account.css';
   document.head.appendChild(css);
</script>

<script type="text/javascript">
  
  //make data editable
  function editNameField(){
   document.getElementById("name").readOnly = false;
   if(document.getElementById("name").value==="" || document.getElementById("email").value==="") { 
            document.getElementById('btnChanges').disabled = true; 
        } else { 
            document.getElementById('btnChanges').disabled = false;
        }
  }
 function editEmailField(){
  document.getElementById("email").readOnly = false;
  if(document.getElementById("name").value==="" || document.getElementById("email").value==="") { 
            document.getElementById('btnChanges').disabled = true; 
        } else { 
            document.getElementById('btnChanges').disabled = false;
        }
 }
 function btnChangedisable() {
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