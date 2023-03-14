
<div class="main-panel" id="main-panel">
   <div class="content">
    <form  method="POST" enctype="multipart/form-data">
      <?php if ($venue) {?>
       <div class="form-group">
         <label for="venueID">ID</label>
         <input type="text" class="form-control" id="venueID" name="venueID" value="<?=$venue->getID()?>" readonly>
      </div>
      <?php } else {?>
         <h2>Create Venue</h2>
      <?php }?>
      <div class="form-group">
         <label for="venueName">Name</label>
         <input type="text" class="form-control" id="venueName" name="venueName" value="<?= $venue ? $venue->getName() : '' ?>" required>
      </div>
      <div class="form-group">
         <label for="venueMapURL">Map URL</label>
         <input type="text" class="form-control" id="venueMapURL" name="venueMapURL" value="<?= $venue ? $venue->getMapURL() : '' ?>">
      </div>
      
      <input name="updateVenue" type="submit" class="btn btn-primary" value="Save" />
      </form>
   </div>
</div>
<script>    
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/admin_listview.css';
   document.head.appendChild(css);    
</script>
