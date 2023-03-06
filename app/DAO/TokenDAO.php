<?php 
require_once("Database.php");

class TokenDAO extends Database {
   
    function createToken($userEmail, $Selector, $Token, $Expires, $Type) {
        try { 
            $stmt = $this->connection->prepare("INSERT INTO accounttokenes (UserEmail, Selector, Token, Expires, Type) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$userEmail, $Selector, $Token, $Expires->format('Y-m-d H:i:s'), $Type]);
            echo "created";
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function getTokenByUserEmail($userEmail) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, UserEmail, Selector, Token, Expires, Type FROM accounttokenes WHERE UserEmail = ?");
            $stmt->execute($userEmail);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Token');
            $token = $stmt->fetch();
            return $token;
        } catch (PDOException $e) {
            echo $e;
        }
    }
  
    function updateTokenByUserEmail($userEmail, $Token, $Selector, $Expires) { 
        try {
           $stmt = $this->connection->prepare("UPDATE accounttokenes SET Token = ?, Selector = ?, Expires = ? WHERE UserEmail = ?;");
           $stmt->execute([$Token, $Selector, $Expires->format('Y-m-d H:i:s'), $userEmail]);
       } catch (PDOException $e)
       {
           echo $e;
       }
   }
    function deleteTokenBySelector($selector) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM accounttokenes WHERE Selector = ?");
            $stmt->execute([$selector]);
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function tokenExists($userEmail) {
        try { 
            $stmt = $this->connection->prepare("SELECT EXISTS (SELECT * FROM accounttokenes WHERE UserEmail = ? AND Type = ?)");
      
            $stmt->execute([$userEmail, 1,]);
            if($stmt->fetchColumn()) 
                { return true; }
            else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function verifyTokenGetUserEmail($selector, $validator) {

        $stmt = $this->connection->prepare("SELECT * FROM accounttokenes WHERE Selector = ? AND Expires >= NOW()");
        $stmt->execute([$selector]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $calc = hash('sha256', hex2bin($validator));
            if (hash_equals($calc, $results[0]['Token'])) {
                return $results[0]['UserEmail'];            
            }
                return false;
            // Remove the token from the DB regardless of success or failure.
        }
    }
}
