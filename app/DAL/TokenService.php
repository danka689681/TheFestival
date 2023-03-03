<?php
require __DIR__ . '/../DAO/TokenDAO.php';

class TokenService {
    public function createToken($UserID, $Selector, $Token, $Expires, $Type) {
        $dao = new TokenDAO();
        $token = $dao->createToken($UserID, $Selector, $Token, $Expires, $Type);
    }
    public function getTokenByUserID($ID) {
        $dao = new TokenDAO();
        $token = $dao->getTokenByUserID($ID) ;
        return $token;
    }
 
    public function updateTokenByUserID($ID, $Token, $Selector, $Expires){
        $dao = new TokenDAO();
        $dao->updateTokenByUserID($ID, $Token, $Selector, $Expires);
    }
    public function deleteTokenBySelector($selector){
        $dao = new TokenDAO();
        $dao->deleteTokenBySelector($selector);
    }

    public function tokenExists($userID) {
        $dao = new TokenDAO();
        $tokenExists = $dao->tokenExists($userID);
        return $tokenExists;
    }

    public function verifyTokenGetUserID($selector, $validator) {
        $dao = new TokenDAO();
        $userID = $dao->verifyTokenGetUserID($selector, $validator) ;
        return $userID;
    }

}