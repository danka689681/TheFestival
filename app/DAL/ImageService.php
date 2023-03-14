<?php
require __DIR__ . '/../DAO/ImageDAO.php';

class ImageService {
    public function deleteArtistImageByID($ID){
        $dao = new ImageDAO();
        $deleted = $dao->deleteArtistImageByID($ID);
        return $deleted;
    }

    public function createArtistImage($Name, $ArtistID, $Type, $IsLogo, $Data) {
        $dao = new ImageDAO();
        $created = $dao->createArtistImage($Name, $ArtistID, $Type, $IsLogo, $Data);
        return $created;
    }
    function getHistoryImageByName($name){
        $dao = new ImageDAO();
        $image = $dao->getHistoryImageByName($name);
        return $image;
    }

}