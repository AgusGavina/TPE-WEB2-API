<?php
require_once 'model.php';
class ProductModel  extends Model
{
    
    function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();

        // $tasks es un arreglo de tareas
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
    function getProduct($id)
    {
        $query = $this->db->prepare("SELECT * FROM products WHERE Product_id =?");
        $query->execute([$id]);

        $id = $query->fetchAll(PDO::FETCH_OBJ);

        return $id;
    }
    function deleteProduct($id)
    {
        $query = $this->db->prepare('DELETE FROM products WHERE Product_id=?');
        $query->execute([$id]);
    }
    function insertProduct($Product_name, $Milliliters, $Price, $Category_id)
    {
        $query = $this->db->prepare('INSERT INTO products (Product_name, Milliliters, Price,Category_id) VALUES(?,?,?,?)');
        $query->execute([$Product_name, $Milliliters, $Price, $Category_id]);

        return $this->db->lastInsertId();
    }
    function updateProduct($Product_name, $Milliliters, $Price, $Category_id, $id)
    {
        $query = $this->db->prepare('UPDATE `products` SET `Product_name` = ?, `Milliliters` = ?, `Price` = ?, Category_id=? WHERE `products`.`Product_id` = ?;');
        $query->execute([$Product_name, $Milliliters, $Price, $Category_id, $id]);
    }
}
