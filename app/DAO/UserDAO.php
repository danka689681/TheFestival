<?php 
require_once("Database.php");

class UserDAO extends Database {
    function getTables() {
        try { 
            $stmt = $this->connection->prepare("SELECT * FROM sys.Tables");
            $stmt->fetchAll();
            echo "here";
            foreach ($stmt as $value) {
                echo $value;
            }

        } catch (PDOException $e) {
            echo $e;
        }
    }
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