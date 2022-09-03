<?php 

require_once './methods.php';

class usuarios extends methods {

    public function __construct() {
        $this->table = 'usuarios';
    }

    public function insert($username, $password)
    {
        $sql = "INSERT INTO $this->table (username, password) VALUES (:username, :password)";

        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);

        $statement->execute();
    }
    
    public function update($id, $new_username, $new_password)
    {
        $sql = "UPDATE $this->table SET username= :username, password= :password WHERE id= :id;";

        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':username', $new_username);
        $statement->bindParam(':password', $new_password);

        $statement->execute();
    }
}
