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
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table">
                        <thead class=" text-default">
                           <th>
                              Name
                           </th>
                           <th>
                              Email
                           </th>
                           <th>
                              Password
                           </th>
                           <th>
                              Role
                           </th>
                           <th>
                              Registration date
                           </th>
                           <th class="text-right">CRUD</th>
                        </thead>
                        <tbody>
                        <?php
                         foreach ($users as $user) {
                          ?>
                          <tr>
                              <td><?= $user->getName() ?></td>
                              <td><?= $user->getEmail() ?></td>
                              <td><a class="text-warning" href="">reset password</a></td>
                              <td><?=($user->getIsAdmin() === '1') ? 'Admin' : 'User'; ?></td>
                              <td><?= $user->getRegistrationDate() ?></td>
                              <td class="td-actions text-right">
                                 <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                 <i class="now-ui-icons ui-2_settings-90"></i>
                                 </button>
                                 <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                 <i class="now-ui-icons ui-1_simple-remove"></i>
                                 </button>
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