<?php
require_once "model.php";

class productModel extends Model
{
    public function getCategorys()
    {
        $query = $this->db->prepare('SELECT * FROM categorys');
        $query->execute();

        $categorys = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorys;
    }

    public function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    public function nameCategory()
    {
        $query = $this->db->prepare("SELECT * FROM categorys WHERE Category_id ");
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    public function getCategory()
    {
        $query = $this->db->prepare('SELECT * FROM categorys');
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    public function getProductsByCategory($id)
    {
        $query = $this->db->prepare("SELECT * FROM products WHERE Category_id =?");
        $query->execute([$id]);

        $id = $query->fetchAll(PDO::FETCH_OBJ);

        return $id;
    }
}
