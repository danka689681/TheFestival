
<div class="main-panel" id="main-panel">
   <h1 class="centered-text">Manage Users</h1>
   <div class="panel-header panel-header-sm panel-header-colored">
   </div>
   <div class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Users</h4>
                  <form method="POST" class="searchForm">
                     <input class="searchIput form-control" id="searchUsers" name="searchUsers" type="text">
                     <input type="submit" id="searchUsersBtn" class="btn btn-warning btn-round" value="Search / Clear">
                   </form>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table">
                        <thead class=" text-default">
                           <th>Name 
                           <form method="POST">
                              <input type="submit" class="<?php echo $ASCName?>" id="sortNameASC" name="sort" class="btn btn-warning btn-round" value="ASC" >
                           </form>     
                           <button id="s" name="s" class="btn btn-warning btn-round">d</button>

                           </th>
                           <th>Email</th>
                           <th>Password</th>
                           <th>Role</th>
                           <th>Registration date</th>
                           <th class="text-right">CRUD</th>
                        </thead>
                        <tbody>
                        <?php
                         foreach ($displayUsers as $user) {
                          ?>
                          <tr>
                              <td><?= $user->getName() ?></td>
                              <td><?= $user->getEmail() ?></td>
                              <td><button  name="reset" onclick="resetPassword('<?= $user->getName()?>','<?= $user->getEmail()?>')" >reset password</button></td>
                              <td><?=($user->getIsAdmin() == 1) ? 'Admin' : 'User'; ?></td>
                              <td><?= $user->getRegistrationDate() ?></td>
                              <td class="td-actions text-right">
                                 <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon"  onclick="openUserForm('<?= $user->getID()?>','<?= $user->getIsAdmin()?>')">
                                 <i class="now-ui-icons ui-2_settings-90"></i>
                                 </button>
                                 <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon"  onclick="openDeleteUserForm('<?= $user->getID()?>')">
                                 <i class="now-ui-icons ui-1_simple-remove"></i>
                                 </button>
                                 <div class="blur-bkg" id="bkg-<?= $user->getID()?>">
                                 <div class="form-popup">
                                    <form method="POST" class="form-container" id="userForm-<?= $user->getID()?>">
                                    <h2 class="centered-text">Edit User</h2>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="inputCity">ID</label>
                                       <input type="text" class="form-control" name="userID"  id="disabledInput"  value=<?= $user->getID()?> readonly> 
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputCity">Name</label>
                                       <input type="text" class="form-control" name="name" id="inputName" value=<?= $user->getName()?> required>
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                       <label for="inputZip">Email</label>
                                       <input type="email" class="form-control" name="email" id="inputEmail" value=<?= $user->getEmail()?> required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputState">Access</label>
                                       <select class="form-control" id="selectRole-<?= $user->getID()?>" name="role" >
                                          <option value=0>User</option>
                                          <option value=1>Admin</option>
                                       </select>
                                    </div>
                                 </div>
                                 <input type="submit" name="updateUser" class="btn btn-info" value="Save" />
                                 <button  type="button" class="btn btn-danger" onclick="closeUserForm(<?= $user->getID()?>)">Cancel</button>
                                    </form>
                                 </div>
                                 </div>
                                 <div class="blur-bkg" id="bkg-deleteUser-<?= $user->getID()?>">
                                 <div class="form-popup">
                                    <form method="POST" class="form-container" id="deleteUserForm-<?= $user->getID()?>">
                                       <h2 class="centered-text">Are you sure you want to delete user <?= $user->getName()?>?</h2>
                                       <input type="text" class="form-control" name="userID"  id="disabledInput"  value=<?= $user->getID()?> readonly> 
                                       <input type="submit" name="deleteUser" class="btn btn-info" value="Yes" />
                                       <button  type="button" class="btn btn-danger" onclick="closeDeleteUserForm(<?= $user->getID()?>)">No</button>
                                    </form>
                                 </div>
                                </div>
                              </td>
                           </tr>
                    
                          <?php
                          }
                          ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/admin_users.css';
   document.head.appendChild(css);
</script>
<script>
   document.getElementById("s").addEventListener("click", sendData);

   function resetPassword(to_name, to_email) {
      var templateParams = {
      to_name: to_name,
      to_email: to_email,
      message: 'Click the link to reset your password'
      };
 
      emailjs.send('service_k493h79', 'template_lfrdk6x', templateParams)
         .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
         }, function(error) {
            console.log('FAILED...', error);
         });
         }

   function sendData() {
      console.log("fr");
      $.ajax({
         url: "<?php __DIR__ . '/Controller/AdminController.php' ?>",
         type: 'POST',
         data: {test: "sucess"},
         });
      }
      
      function openUserForm(id, isAdmin) {  
         isAdmin = isAdmin == 1 ? 1 : 0; 
         document.getElementById(`selectRole-${id}`).value = isAdmin;
         document.getElementById(`bkg-${id}`).style.display = "block";
      }

      function closeUserForm(id) {
        document.getElementById(`bkg-${id}`).style.display = "none";
        document.getElementById(`userForm-${id}`).reset();
      }
      function openDeleteUserForm(id) {  
         document.getElementById(`bkg-deleteUser-${id}`).style.display = "block";
      }
      function closeDeleteUserForm(id) {
        document.getElementById(`bkg-deleteUser-${id}`).style.display = "none";
      }


</script>   