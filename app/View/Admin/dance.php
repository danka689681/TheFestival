
<div class="main-panel" id="main-panel">
   <h1 class="centered-text">Dance event</h1>
   <div class="panel-header panel-header-sm panel-header-colored">
   </div>
   <div class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Artists</h4>
                  <button type="button" rel="tooltip"  class="btn btn-info"  onclick="openUserForm('createUser', ' ')">Create Artist</button>
                  <div class="blur-bkg" id="bkg-createUser">
                  <div class="form-popup">
                                    <form method="POST" class="form-container" id="userForm-createUser">
                                    <h2 class="centered-text">Create Artist</h2>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="inputName">Name</label>
                                       <input type="text" class="form-control" name="name" id="inputName"  required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputDescription">Description</label>
                                       <input type="text" class="form-control" name="description" id="inputDescription" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputYoutube">YouTube</label>
                                       <input type="text" class="form-control" name="youtube" id="inputYoutube" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputSpotify">Spotify</label>
                                       <input type="text" class="form-control" name="spotify" id="inputSpotify" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputLogo">Logo</label>
                                       <input type="text" class="form-control" name="logo" id="inputLogo" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputImages">Images</label>
                                       <input type="text" class="form-control" name="images" id="inputImages" required>
                                    </div>
                                 </div>
                                 <input type="submit" name="createUser" class="btn btn-info" value="Create" />
                                 <button  type="button" class="btn btn-danger" onclick="closeUserForm('createUser')">Cancel</button>
                                    </form>
                                 </div>
                 
               </div>
               <form method="POST" class="searchForm">
                     <input class="searchIput form-control" name="searchUsers" type="text">
                     <input type="submit" id="searchUsersBtn" class="btn btn-warning btn-round" value="Search">
                   </form>     
            </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table">
                        <thead class=" text-default">
                           <th> 
                              Name
                              <a class="sortIcon" href="<?php __DIR__ . '/Controller/AdminController.php'?>?dir=asc&sort=name"><i id="name-asc" class="fa-solid  fa-sort btnVisible"></i></a> 
                              <a class="sortIcon" href="<?php __DIR__ . '/Controller/AdminController.php'?>?dir=desc&sort=name"><i id="name-desc" class="fa-solid fa-sort-up btnHidden"></i></a> 
                           </th>
                           <th>Description</th>
                           <th>YouTube</th>
                           <th>Spotify</th>
                           <th>Logo</th>
                           <th>Images</th>
                           <th class="text-right">CRUD</th>
                        </thead>
                        <tbody>
                        <?php
                         foreach ($displayUsers as $user) {
                          ?>
                          <tr>
                              <td><?= $user->getName() ?></td>
                              <td><?= $user->getEmail() ?></td>
                              <td><a href="<?php __DIR__ . '/Controller/AdminController.php'?>?pswdReset=<?= $user->getEmail()?>&pswdResetName=<?= $user->getName()?>" name="resetPswd" class="<?php echo $user->getPassword() == null ? 'BlueText' : '' ?>"><?php echo $user->getPassword() == null ? 'resend invintation' : 'reset password' ?></a></td>
                              <td><?=  Role::from($user->getRole() == "" ? "User" : $user->getRole())->name?></td>  
                              <td><?= $user->getRegistrationDate() ?></td>
                              <td class="td-actions text-right">
                                 <button type="button" rel="tooltip"  class="btn btn-info btn-sm btn-icon"  onclick="openUserForm('<?= $user->getID()?>','<?= $user->getRole() ?>')">
                                 <i class="fa-light fa-pen-to-square"></i>
                                 </button>
                                 <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon"  onclick="openDeleteUserForm('<?= $user->getID()?>')">
                                 <i class="fa-light fa-xmark-large"></i>
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
                                          <option value="User">User</option>
                                          <option value="Admin">Admin</option>
                                          <option value="Employee">Employee</option>
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

      window.addEventListener("load", setData);

      function setData() {
      let filter = "<?php echo $filterBy ?>"
      console.log(filter)
      document.getElementById("select_id").value = filter 

      let sort = "<?php echo $setSort ?>"
      let sortType = "<?php echo $setSortType ?>"
      pressedBtn = document.getElementById(`${sort}-${sortType}`).classList
      pressedBtn.remove('btnVisible')
      pressedBtn.add('btnHidden')

      btnToShow = document.getElementById(`${sort}-${sortType == 'asc' ? 'desc' : 'asc'}`).classList
      btnToShow.remove('btnHidden')
      btnToShow.add('btnVisible')
           
      if (sortType == 'asc') {
         toAdd = btnToShow.contains('fa-sort-up') ? 'fa-sort-up' : 'fa-sort'
         toRemove = btnToShow.contains('fa-sort-up') ? 'fa-sort' : 'fa-sort-up'
      } else {
         toAdd = pressedBtn.contains('fa-sort-up') ? 'fa-sort-down' : 'fa-sort'
         toRemove = pressedBtn.contains('fa-sort-up') ? 'fa-sort' : 'fa-sort-down'
      }

      btnToShow.remove(toRemove)
      btnToShow.add(toAdd)
      console.log("pressed " + pressedBtn + " to show: " + btnToShow)

      }  

   
      function openUserForm(id, role) {
          role = role == "" ? "User" : role
         if (document.getElementById(`selectRole-${id}`)) {
            document.getElementById(`selectRole-${id}`).value = role;
         } 
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