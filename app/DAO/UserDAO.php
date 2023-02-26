<?php 
require_once("Database.php");

class UserDAO extends Database {
   
    function getUserByEmail($email) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, Name, Email, password, IsAdmin, RegistrationDate FROM users WHERE Email = ?");
            $stmt->execute([$email]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllUsers() {
        try {
            $stmt = $this->connection->prepare("SELECT ID, Name, Email, password, IsAdmin, RegistrationDate FROM users");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();
            return $users;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function updateUserByID($id, $name, $email, $role) {
         try {
            $stmt = $this->connection->prepare("UPDATE users SET Name = ?, Email = ?, IsAdmin = ? WHERE ID = ?;");
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $role);
            $stmt->bindValue(4, intval($id));

            $stmt->execute();
            return true;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }
    function createUser($name, $email, $password) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (Name, Email, Password) VALUES (?, ?, ?)");
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $password);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
    function deleteUserByID($id) {
        try {
           $stmt = $this->connection->prepare("DELETE FROM users WHERE ID = ?;");
           $stmt->execute([$id]);
           $stmt->execute();
           return true;
       } catch (PDOException $e)
       {
           echo $e;
           return false;
       }
   }


}