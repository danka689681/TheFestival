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
    public function createUser($name, $email, $password) {
        $dao = new UserDAO();
        $created = $dao->createUser($name, $email, $password);
        return $created;
    }

    public function updateUserByID($id, $name, $email, $role){
        $dao = new UserDAO();
        $updated = $dao->updateUserByID($id, $name, $email, $role);
        return $updated;
    }
    public function updateUsersPassword($userEmail, $newPassword){
        $dao = new UserDAO();
        $updated = $dao->updateUsersPassword($userEmail, $newPassword);
        return $updated;
    }
    public function verifyUser($email){
        $dao = new UserDAO();
        $verified = $dao->verifyUser($email);
        return $verified;
    }
    public function deleteUserByID($id){
        $dao = new UserDAO();
        $deleted = $dao->deleteUserByID($id);
        return $deleted;
    }

}