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
        $sql = "INSERT INTO productcategory (catname)
                VALUES(:catname);";

        $this->db->runSQL($sql, $category);
        return $this->db->lastInsertId();
    }

    //Get one category by ID
    public function get(int $catid)
    {
        $sql = "SELECT * FROM productcategory WHERE catid = :catid";
        $args = ['catid' => $catid];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    //Get category by name
    public function getByNamse(string $name)
    {
        $sql = "SELECT * FROM productcategory WHERE catname = :catname";
        $args = ['catname' => $name];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    //Get all categories
    public function getAll() : array
    {
        $sql = "SELECT * FROM productcategory";
        return $this->db->runSQL($sql) -> fetchAll();
    }

    //Delete category
    public function delete(int $catid) : bool
    {
        $sql = "DELETE FROM productcategory WHERE catid = :catid";
        return $this->db->runSQL($sql, ['catid' => $catid])->execute();
    }
}
?>