
<div class="main-panel" id="main-panel">
   <h1 class="centered-text">Dance event</h1>
   <div class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Artists</h4>
                  <a href="/admin/editartist?id=" type="button" rel="tooltip"  class="btn btn-info"  onclick="openCreateForm('createArtist', ' ')">Create Artist</a>      
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
                         foreach ($displayArtists as $artist) {
                          ?>
                          <tr>
                              <td><?= $artist->getName() ?></td>
                              <td><?= $artist->getDescription() ?></td>
                              <td><a href="<?= $artist->getYouTube() ?>">YouTube</a></td>
                              <td><a href="<?= $artist->getSpotify() ?>">Spotify</a></td>
                              <td>
                                 <?php if ($artist->getLogo()) {?>
                                    <img src="data:image/<?php echo $artist->getLogo()->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($artist->getLogo()->getData()); ?>" alt="<?php echo $artist->getLogo()->getName(); ?>" /></td>
                                 <?php } else { ?><p>no Logo</p><?php }?>
                              <td>
                                    <?php if ($artist->getImages()) {
                                       foreach ($artist->getImages() as $image): ?>
                                       <div class="imagePreview">
                                          <img src="data:image/<?php echo $image->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($image->getData()); ?>" />
                                       </div>
                                    <?php endforeach; 
                                    } else { ?>
                                       <p>no Images</p>
                                    <?php }?>
                              </td>
                              <td class="td-actions text-right">
                                 <a href="/admin/editartist?id=<?= $artist->getID() ?>" rel="tooltip"  class="btn btn-info btn-sm btn-icon">
                                 <i class="fa-light fa-pen-to-square"></i>
                                    </a>
                                 <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon" onclick="openDeleteForm('bkg-deleteArtist-<?= $artist->getID()?>')">
                                 <i class="fa-light fa-xmark-large"></i>
                                 </button>
                                 <div class="blur-bkg" id="bkg-deleteArtist-<?= $artist->getID()?>">
                                 <div class="form-popup">
                                    <form method="POST" class="form-container" id="deleteArtistForm-<?= $artist->getID()?>">
                                       <h2 class="centered-text">Are you sure you want to delete artist <?= $artist->getName()?>?</h2>
                                       <input type="text" class="form-control" name="artistID"  id="disabledInput"  value=<?= $artist->getID()?> readonly> 
                                       <input type="submit" name="deleteArtist" class="btn btn-info" value="Yes" />
                                       <button  type="button" class="btn btn-danger" onclick="closeDeleteForm('bkg-deleteArtist-<?= $artist->getID()?>')">No</button>
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

   
     

      function closeUserForm(id) {
        document.getElementById(`bkg-${id}`).style.display = "none";
        document.getElementById(`userForm-${id}`).reset();
      }

</script>   
<script type="text/javascript" src="../assets/js/adminFormInteraction.js"></script>    