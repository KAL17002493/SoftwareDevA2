<?php

//Product controller
class ProductController
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function create(array $product) : int
    {

            $sql = "INSERT INTO products(name, description, price, image, categoryId)
                    VALUES (:name, :description, :price, :image, :categoryId);";
            $this->db->runSQL($sql, $product);
            return $this->db->lastInsertId();

    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    public function getAll() : array
    {
        $sql = "SELECT * FROM products, productcategory WHERE productcategory.catid = products.categoryId";
        return $this->db->runSQL($sql) -> fetchAll();
    }

    public function update(array $product) : bool
    {
        $sql = "UPDATE products 
                SET name = :name, 
                    description = :description, 
                    price = :price, 
                    image = :image,
                    categoryId = :categoryId
                WHERE id = :id;";
        
        var_dump($sql);
        return $this->db->runSQL($sql, $product)->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM products WHERE id = :id";
        return $this->db->runSQL($sql, ['id' => $id])->execute();
    }


}

?>