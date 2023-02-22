<?php
require __DIR__ . '/../DAO/UserDAO.php';

class UserService {
    public function getUserByEmail($email) {
        $dao = new UserDAO();
        $user = $dao->getUserByEmail($email);
        return $user;
    }
    public function getAllUsers() {
        $dao = new UserDAO();
        $user = $dao->getAllUsers();
        return $user;
    }
}