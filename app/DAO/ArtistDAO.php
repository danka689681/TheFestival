<?php 
require_once("Database.php");

class ArtistDAO extends Database {

    function getAllArtists() {
        try {
            $stmt = $this->connection->prepare("SELECT artists.ID, artists.Name, artists.Description, artists.YouTube, artists.Spotify, artists.DemoSong, artistimages.ID as ForeignKeyID, artistimages.Name as ImageName, artistimages.Type, artistimages.IsLogo, artistimages.Data FROM `artists` INNER JOIN artistimages ON artists.ID=artistimages.ArtistID;");
            $stmt->execute();
            return createArtistObject($stmt);
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getArtistByID($ID) {
        try {
            $stmt = $this->connection->prepare("SELECT artists.ID, artists.Name, artists.Description, artists.YouTube, artists.Spotify, artists.DemoSong, artistimages.ID as ForeignKeyID, artistimages.Name as ImageName, artistimages.Type, artistimages.IsLogo, artistimages.Data FROM `artists` INNER JOIN artistimages ON artists.ID=artistimages.ArtistID WHERE artists.ID = ? ;");
            $stmt->execute([$ID]);
            return createArtistObject($stmt);
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function updateArtistByID($ID, $Name, $Description, $YouTube, $Spotify, $DemoSong) {
        try {
           $stmt = $this->connection->prepare("UPDATE artists SET Name = ?, Description = ?, YouTube = ?, Spotify = ?, DemoSong = ? WHERE ID = ?;");
           $stmt->bindValue(1, $Name);
           $stmt->bindValue(2, $Description);
           $stmt->bindValue(3, $YouTube);
           $stmt->bindValue(4, $Spotify);
           $stmt->bindValue(5, $DemoSong);
           $stmt->bindValue(6, $ID);
           $stmt->execute();
           return true;
       } catch (PDOException $e)
       {
           echo $e;
           return false;
       }
   }
   function deleteArtistByID($ID){
    try {
       $stmt = $this->connection->prepare("DELETE FROM artists WHERE ID = ?;");
       $stmt->execute([$ID]);
       $stmt->execute();
       return true;
   } catch (PDOException $e)
   {
       echo $e;
       return false;
   }
}

function createArtist($Name, $Description, $YouTube, $Spotify, $DemoSong)  {
    try {
        $stmt = $this->connection->prepare("INSERT INTO artists (Name, Description, YouTube, Spotify, DemoSong) VALUES (?, ?, ?, ?, ?);");
        $stmt->execute([$Name, $Description, $YouTube, $Spotify, $DemoSong]);
        return $this->connection->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
        return false;
    }
}

}