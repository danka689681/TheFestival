<?php
require __DIR__ . '/../DAO/TokenDAO.php';

class TokenService {
    public function createToken($Email, $Selector, $Token, $Expires, $Type) {
        $dao = new TokenDAO();
        $token = $dao->createToken($Email, $Selector, $Token, $Expires, $Type);
    }
    public function getTokenByUserEmail($userEmail) {
        $dao = new TokenDAO();
        $token = $dao->getTokenByUserEmail($userEmail) ;
        return $token;
    }
 
    public function updateTokenByUserEmail($Email, $Token, $Selector, $Expires){
        $dao = new TokenDAO();
        $dao->updateTokenByUserEmail($Email, $Token, $Selector, $Expires);
    }
    public function deleteTokenBySelector($selector){
        $dao = new TokenDAO();
        $dao->deleteTokenBySelector($selector);
    }

    public function tokenExists($userEmail) {
        $dao = new TokenDAO();
        $tokenExists = $dao->tokenExists($userEmail);
        return $tokenExists;
    }

    public function verifyTokenGetUserEmail($selector, $validator) {
        $dao = new TokenDAO();
        $userEmail = $dao->verifyTokenGetUserEmail($selector, $validator) ;
        return $userEmail;
    }

}