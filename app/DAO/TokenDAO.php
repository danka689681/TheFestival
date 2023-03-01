<?php 
require_once("Database.php");

class TokenDAO extends Database {
   
    function createToken($UserID, $Selector, $Token, $Expires, $Type) {
        try { 
            $stmt = $this->connection->prepare("INSERT INTO accounttokenes (UserID, Selector, Token, Expires, Type) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$UserID, $Selector, $Token, $Expires->format('Y-m-d H:i:s'), $Type]);
            echo "created";
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function getTokenByUserID($userID) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, UserID, Selector, Token, Expires, Type FROM accounttokenes WHERE UserID = ?");
            $stmt->execute($userID);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Token');
            $token = $stmt->fetch();
            return $token;
        } catch (PDOException $e) {
            echo $e;
        }
    }
  
    function updateTokenByUserID($userID, $Token, $Selector, $Expires) { 
        try {
           $stmt = $this->connection->prepare("UPDATE accounttokenes SET Token = ?, Selector = ?, Expires = ? WHERE UserID = ?;");
           $stmt->execute([$Token, $Selector, $Expires->format('Y-m-d H:i:s'), $userID]);
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
    function tokenExists($userID) {
        try { 
            $stmt = $this->connection->prepare("SELECT EXISTS (SELECT * FROM accounttokenes WHERE UserID = ? AND Type = ?)");
      
            $stmt->execute([$userID, 1,]);
            if($stmt->fetchColumn()) 
                { return true; }
            else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function verifyTokenGetUserID($selector, $validator) {

        $stmt = $this->connection->prepare("SELECT * FROM accounttokenes WHERE Selector = ? AND Expires >= NOW()");
        $stmt->execute([$selector]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $calc = hash('sha256', hex2bin($validator));
            if (hash_equals($calc, $results[0]['Token'])) {
                return $results[0]['UserID'];            
            }
                return false;
            // Remove the token from the DB regardless of success or failure.
        }
    }
}
