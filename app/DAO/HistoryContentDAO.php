<?php 
require_once("Database.php");

class HistoryContentDAO extends Database {
   
    function getContentByName($name) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, Name, Content FROM historycontent WHERE Name = ?");
            $stmt->execute([$name]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'HistoryContent');
            $content = $stmt->fetch();
            return $content;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>