<?php
require __DIR__ . '/../DAO/UserDAO.php';

class UserService {
    public function getUserByEmail($email) {
        $dao = new UserDAO();
        $user = $dao->getUserByEmail($email);
        return $user;
    }
}