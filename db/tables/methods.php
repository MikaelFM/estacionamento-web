<?php

require_once "../conexao/Conexao.php";

class methods {

    private $connection;
    public $table;

    public function __construct() {
        $this->connection = connection();
    }

    public function get_all()
    {

        $sql = "SELECT * FROM $this->table";

        $statement = $conexao->prepare($sql);

        $statement->execute();

        $resultado = array();

        while ($item = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($resultado, $item);
        }

        return $resultado;
    }

    public function get_where($fields = null, $where = null, $orderby = null)
    {      
        $sql = "SELECT :fields FROM $this->table :where :orderby";
    
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(":fields", $fields != null ? $fields : '*');
        $statement->bindParam(":where", $where != null ? "WHERE $where" : "");
        $statement->bindParam(":orderby", $orderby != null ? "ORDER BY $orderby" : "");

        $statement->execute();

        $resultado = array();

        while ($item = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($resultado, $item);
        }

        return $resultado;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id",  $id);

        $statement->execute();
    }
}
