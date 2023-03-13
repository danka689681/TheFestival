
<div class="main-panel" id="main-panel">
   <h1 class="centered-text">Dance event</h1>
   <div class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Venues</h4>
                  <a href="/admin/editvenue?id=" type="button" rel="tooltip"  class="btn btn-info"  onclick="openCreateForm('createVenue', ' ')">Create Venue</a>      
               <form method="POST" class="searchForm">
                     <input class="searchIput form-control" name="searchVenues" type="text">
                     <input type="submit" id="searchVenuesBtn" class="btn btn-warning btn-round" value="Search">
                   </form>     
            </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table">
                        <thead class=" text-default">
                           <th> 
                              Name
                           </th>
                           <th>MapURL</th>
                           <th class="text-right">CRUD</th>
                        </thead>
                        <tbody>
                        <?php
                         foreach ($displayVenues as $venue) {
                          ?>
                          <tr>
                              <td><?= $venue->getName() ?></td>
                              <td><iframe src="<?= $venue->getMapURL() ?>" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                              <td class="td-actions text-right">
                                 <a href="/admin/editvenue?id=<?= $venue->getID() ?>" rel="tooltip"  class="btn btn-info btn-sm btn-icon">
                                 <i class="fa-light fa-pen-to-square"></i>
                                    </a>
                                 <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon" onclick="openDeleteForm('bkg-deleteVenue-<?= $venue->getID()?>')">
                                 <i class="fa-light fa-xmark-large"></i>
                                 </button>
                                 <div class="blur-bkg" id="bkg-deleteVenue-<?= $venue->getID()?>">
                                 <div class="form-popup">
                                    <form method="POST" class="form-container" id="deleteVenueForm-<?= $venue->getID()?>">
                                       <h2 class="centered-text">Are you sure you want to delete venue <?= $venue->getName()?>?</h2>
                                       <input type="text" class="form-control" name="venueID"  id="disabledInput"  value=<?= $venue->getID()?> readonly> 
                                       <input type="submit" name="deleteVenue" class="btn btn-info" value="Yes" />
                                       <button  type="button" class="btn btn-danger" onclick="closeDeleteForm('bkg-deleteVenue-<?= $venue->getID()?>')">No</button>
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
   css.href = '../assets/css/admin_listview.css';
   document.head.appendChild(css);
</script>  
<script type="text/javascript" src="../assets/js/adminFormInteraction.js"></script>    