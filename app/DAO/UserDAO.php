<?php 
require_once("Database.php");

class UserDAO extends Database {
   
    function getUserByEmail($email) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, Email, password, IsAdmin FROM users WHERE Email = ?");
            $stmt->execute([$email]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}