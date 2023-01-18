<?php

class MemberController
{
    protected $db;

    //constructor
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    //register user
    public function register(array $member) : bool
    {
        try {
            //Hashes user provided password
            $member['password'] = password_hash($member['password'], PASSWORD_DEFAULT);

            //Inserts provided date into SQL fields
            $sql = "INSERT INTO users(firstname, lastname, password, email)
                    VALUES (:firstname, :lastname, :password, :email);";
    
            $this->db->runSQL($sql, $member);

            return true;

        } catch (PDOException $e) {

            if ((int)$e->getCode() === 23000) { //Check for duplicates
                return false;
            }
            throw $e;
        }
       
    }

    //GET SINGLE USER
    public function get(int $id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    //GET ALL
    public function getAll() : array
    {
        $sql = "SELECT * FROM users";
        return $this->db->runSQL($sql) -> fetchAll();
    }

    //GET ALL BY EMAIL
    public function getByEmail(string $email) 
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $args = ['email' => $email];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    public function update(array $member) : bool
    {
        $sql = "UPDATE users 
                SET firstname = :firstname, 
                    lastname = :lastname, 
                    password = :password,
                    email = :email,
                    role = :role
                WHERE id = :id;";

        return $this->db->runSQL($sql, $member)->execute();
    }

    //DELETE USER
    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return $this->db->runSQL($sql, ['id' => $id])->execute();
    }

    //Check if provided details matches ones in database
    public function login(string $email, string $password)
    {
        //retrives specified data if login successful
        $sql = "SELECT id, firstname, lastname, email, role, password
        FROM users
        WHERE email = :email;";

        //assignts email to $member
        $member = $this->db->runSQL($sql, ['email' => $email]) -> fetch();
        
        //return false if email not found
        if (!$member) {
            return false;
        }

        //Checks if passwords match
        $auth = password_verify($password, $member['password']);

        return $auth ? $member : false;
    }

}

?>