<?php 
require_once("Database.php");

class ImageDAO extends Database {

    function  deleteArtistImageByID($ID) {
        try {
           $stmt = $this->connection->prepare("DELETE FROM artistimages WHERE ID = ?;");
           $stmt->execute([$ID]);
           $stmt->execute();
           return true;
       } catch (PDOException $e)
       {
           echo $e;
           return false;
       }
    }

    function createArtistImage($Name, $ArtistID, $Type, $IsLogo, $Data) {
        try {
           $stmt = $this->connection->prepare("INSERT INTO artistimages (Name, ArtistID, Type, IsLogo, Data) VALUES (?, ?, ?, ?, ?);");
           $stmt->bindValue(1, $Name);
           $stmt->bindValue(2, $ArtistID);
           $stmt->bindValue(3, $Type);
           $stmt->bindValue(4, $IsLogo);
           $stmt->bindValue(5, $Data);
           $stmt->execute();
           return true;
       } catch (PDOException $e)
       {
           echo $e;
           return false;
       }
   }
   function getHistoryImageByName($name){
        try { 
            $stmt = $this->connection->prepare("SELECT ID, Name, Type, IsLogo, Data FROM historyimages WHERE Name = ?");
            $stmt->execute([$name]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Image');
            $image = $stmt->fetch();
            return $image;
        } catch (PDOException $e) {
            echo $e;
        }
   }
}