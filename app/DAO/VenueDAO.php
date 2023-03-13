<?php 
require_once("Database.php");

class VenueDAO extends Database {

    function getAllVenues() {
        try {
            $stmt = $this->connection->prepare("SELECT ID, Name, MapURL FROM danceeventlocations;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Venue');
            $venues = $stmt->fetchAll();
            return $venues;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getVenueByID($ID) {
        try {
            $stmt = $this->connection->prepare("SELECT ID, Name, MapURL FROM danceeventlocations WHERE ID = ?;");
            $stmt->execute([$ID]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Venue');
            $venue = $stmt->fetch();
            return $venue;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function updateVenueByID($ID, $Name, $MapURL) {
        try {
           $stmt = $this->connection->prepare("UPDATE danceeventlocations SET Name = ?, MapURL = ? WHERE ID = ?;");
           $stmt->bindValue(1, $Name);
           $stmt->bindValue(2, $MapURL);
           $stmt->bindValue(3, $ID);
           $stmt->execute();
           return true;
       } catch (PDOException $e)
       {
           echo $e;
           return false;
       }
   }
   function deleteVenueByID($ID){
    try {
       $stmt = $this->connection->prepare("DELETE FROM danceeventlocations WHERE ID = ?;");
       $stmt->execute([$ID]);
       $stmt->execute();
       return true;
   } catch (PDOException $e)
   {
       echo $e;
       return false;
   }
}

function createVenue($Name, $MapURL)  {
    try {
        $stmt = $this->connection->prepare("INSERT INTO danceeventlocations (Name, MapURL) VALUES (?, ?);");
        $stmt->execute([$Name, $MapURL]);
        return $this->connection->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
        return false;
    }
}

}