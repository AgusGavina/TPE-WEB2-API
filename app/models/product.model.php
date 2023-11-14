<?php
require_once "model.php";

class ProductModel extends Model
{
    public function getCategory($id)
    {
        $query = $this->db->prepare('SELECT Category_id FROM categorys WHERE Category_id=?');
        $query->execute([$id]);

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
    public function getProducts($ordering)
    {
        $query = $this->db->prepare('SELECT * FROM products '.$ordering);
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
    public function getProductById($id)
    {
        $query = $this->db->prepare('SELECT * FROM products WHERE Product_id=?');
        $query->execute([$id]);

        $id = $query->fetchAll(PDO::FETCH_OBJ);

        return $id;
    }
    public function getProductsByCategory($id, $ordering)
    {
        $query = $this->db->prepare("SELECT * FROM products WHERE Category_id = ? ".$ordering);
        $query->execute([$id]);

        $id = $query->fetchAll(PDO::FETCH_OBJ);

        return $id;
    }
}
