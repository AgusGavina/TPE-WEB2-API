<?php
require_once "model.php";
class authModel extends Model{

    //LOGIN USUARIO
    public function getEmail($email_user){
        $query = $this->db ->prepare('SELECT * FROM users WHERE email_user = ?');
        $query ->execute([$email_user]);
    
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    // ----- Este codigo se utilizo para crear el usuario webamin -----
    // public function addUser($email_user, $password) {
    //     $query = $this->db->prepare('INSERT INTO users (email_user, password) VALUES(?,?)');
    //     $query->execute([$email_user, $password]);
    //     return $this->db->lastInsertId();
    // }
}