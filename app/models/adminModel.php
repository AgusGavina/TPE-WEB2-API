<?php
require_once "model.php";
class adminModel extends Model
{
    public function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products');
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

    function deleteProduct($id)
    {
        $query = $this->db->prepare('DELETE FROM products WHERE Product_id=?');
        $query->execute([$id]);
    }

    function deleteCategory($id)
    {
        $query = $this->db->prepare('DELETE FROM categorys WHERE Category_id=?');
        $query->execute([$id]);
    }

    function insertProduct($Product_name, $Milliliters, $Price, $Category_id)
    {
        $query = $this->db->prepare('INSERT INTO products (Product_name, Milliliters, Price,Category_id) VALUES(?,?,?,?)');
        $query->execute([$Product_name, $Milliliters, $Price, $Category_id]);

        return $this->db->lastInsertId();
    }

    function updateProduct($product_name, $Milliliters, $Price, $Category_id, $id)
    {
        $query = $this->db->prepare('UPDATE `products` SET `Product_name` = ?, `Milliliters` = ?, `Price` = ?, Category_id=? WHERE `products`.`Product_id` = ?;');
        $query->execute([$product_name, $Milliliters, $Price, $Category_id, $id]);
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
