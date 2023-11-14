<?php
require_once "model.php";
class UserModel extends Model {
    function getUser($user) {
        $query = $this->db->prepare("SELECT * FROM users WHERE email_user = ?");
        $query->execute([$user]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>