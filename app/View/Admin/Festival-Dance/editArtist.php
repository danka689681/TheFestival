
<div class="main-panel" id="main-panel">
   <div class="content">
    <form  method="POST" enctype="multipart/form-data">
      <?php if ($artist) {?>
       <div class="form-group">
         <label for="artistID">ID</label>
         <input type="text" class="form-control" id="artistID" name="artistID" value="<?=$artist->getID()?>" readonly>
      </div>
      <?php } else {?>
         <h2>Create Artist</h2>
      <?php }?>
      <div class="form-group">
         <label for="artistName">Name</label>
         <input type="text" class="form-control" id="artistName" name="artistName" value="<?= $artist ? $artist->getName() : '' ?>" required>
      </div>
      <div class="form-group">
      <textarea id="default-editor" name="artistDescription">
          <?= $artist ? $artist->getDescription() : '' ?>
      </textarea>
      </div>
      <div class="form-group">
         <label for="inputYoutube">YouTube URL</label>
         <input type="text" class="form-control" id="inputYoutube" name="artistYoutube" value="<?= $artist ? $artist->getYouTube() : '' ?>">
      </div>
      <div class="form-group">
         <label for="inputSpotify">Spotify URL</label>
         <input type="text" class="form-control" id="inputSpotify" name="artistSpotify" value="<?= $artist ? $artist->getSpotify() : '' ?>">
      </div>
      <div class="form-group">
         <label for="artistDemoSong">Demo song</label>
         <input type="text" class="form-control" id="artistDemoSong" name="artistDemoSong" value="<?= $artist ? $artist->getDemoSong() : ''?>">
      </div>

      <div class="form-group">
         <?php if ($artist && $artist->getLogo()) {?>
            <p>Logo</p>
            <div class="imageContainer">
             <img name="artistLogo" src="data:image/<?php echo $artist->getLogo()->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($artist->getLogo()->getData()); ?>" alt="<?php echo $artist->getLogo()->getName(); ?>" />
             <a  href="<?php __DIR__ . '/Controller/AdminController.php'?>?id=<?=$artist->getID()?>&deleteImage=<?= $artist->getLogo()->getID()?>" class="btn btn-danger btn-sm btn-icon editImageBtn" >
                <i class="fa-light fa-xmark-large"></i>
             </a>
            <div>
          <?php } else { ?>
            <div class="selectFile"> 
            <label for="inputTag-Logo">
               Select Image <br/>
               <i class="fa fa-2x fa-camera"></i>
               <input id="inputTag-Logo"  name="artistLogo" type="file" accept="image/png, image/jpg, image/svg+xml"/>
               <br/>
               <span id="logoName"></span>
            </label> 
            </div>  
            <?php }?>
      </div>
      <div class="form-group">
      <p>Images</p>
      <?php if ($artist && $artist->getImages()) {
         foreach ($artist->getImages() as $image): ?>
               <div class="imageContainer">
                  <img src="data:image/<?= $image->getType() ?>;charset=utf8;base64,<?php echo base64_encode($image->getData()); ?>" />
                  <a href="<?php __DIR__ . '/Controller/AdminController.php'?>?id=<?=$artist->getID()?>&deleteImage=<?= $image->getID()?>" rel="tooltip" class="btn btn-danger btn-sm btn-icon editImageBtn" >
                     <i class="fa-light fa-xmark-large"></i>
                  </a>
               </div>
         <?php endforeach; 
          } ?>
         <div class="selectFile"> 
         <label for="inputTag">
            Select Image <br/>
            <i class="fa fa-2x fa-camera"></i>
            <input id="inputTag" name="artistImages[]" type="file" accept="image/png, image/jpg, image/svg+xml" multiple/>
            <br/>
            <span id="imageName"></span>
         </label> 
         </div>          
      </div>
      <input name="updateArtist" type="submit" class="btn btn-primary" value="Save" />

      </form>
   </div>
</div>
<script src="../assets/js/tinymce/tinymce.min.js"></script>
<script>    
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/admin_listview.css';
   document.head.appendChild(css);

   tinymce.init({
  selector: 'textarea#default-editor'
});
       let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=> {
            name = "";
            let inputImage = document.getElementById("inputTag").files;
            console.log(inputImage.length)
            for (file in inputImage) {
               name += `${inputImage[file].name}\n`
            }
              
            imageName.innerText = name;
        })
    
    
        let inputLogo = document.getElementById("inputTag-Logo");
        let logoName = document.getElementById("logoName");

        inputLogo.addEventListener("change", ()=> {
            let inputImage = document.getElementById("inputTag-Logo").files[0];
            logoName.innerText = inputImage.name;
        })
    
</script>
