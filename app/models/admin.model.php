<?php
require_once 'model.php';
class AdminModel  extends Model
{
    // ----------- PRODUCTOS -----------
    function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
    function getProduct($id)
    {
        $query = $this->db->prepare("SELECT * FROM products WHERE Product_id =?");
        $query->execute([$id]);

        $id = $query->fetch(PDO::FETCH_OBJ);

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
    // ----------- CATEGORIAS ----------
    public function getCategorys()
    {
        $query = $this->db->prepare('SELECT * FROM categorys');
        $query->execute();

        $categorys = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorys;
    }
    public function getCategory($id)
    {
        $query = $this->db->prepare('SELECT * FROM categorys WHERE Category_id=?');
        $query->execute([$id]);

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
    function deleteCategory($id)
    {
        $query = $this->db->prepare('DELETE FROM categorys WHERE Category_id=?');
        $query->execute([$id]);
    }
    function insertCategory($Category_name)
    {
        $query = $this->db->prepare('INSERT INTO categorys (Category_name) VALUES(?)');
        $query->execute([$Category_name]);

        return $this->db->lastInsertId();
    }
    function updateCategory($category_name, $id)
    {
        $query = $this->db->prepare('UPDATE `categorys` SET `Category_name` = ? WHERE `categorys`.`Category_id` = ?;');
        $query->execute([$category_name, $id]);
    }
}
