<?php

//Category controller
class CategoryController
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    //Create new category
    public function create(array $category) : int
    {
        $sql = "INSERT INTO productcategory (name)
                VALUES(:name);";

        $this->db->runSQL($sql, $category);
        return $this->db->lastInsertId();
    }

    //Get one category by ID
    public function get(int $id)
    {
        $sql = "SELECT * FROM productcategory WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    //Get category by name
    public function getByNamse(string $name)
    {
        $sql = "SELECT * FROM productcategory WHERE name = :name";
        $args = ['name' => $name];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    //Get all categories
    public function getAll() : array
    {
        $sql = "SELECT * FROM productcategory";
        return $this->db->runSQL($sql) -> fetchAll();
    }

    //Delete category
    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM productcategory WHERE id = :id";
        return $this->db->runSQL($sql, ['id' => $id])->execute();
    }
}
?>