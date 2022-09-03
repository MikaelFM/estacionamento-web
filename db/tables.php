<?php

class Table {

    private $connection;
    public $table;
    public $fields;

    public function __construct() {
        $this->connection = connection();
    }

    public function get_all()
    {

        $sql = "SELECT * FROM $this->table";

        $statement = $this->connection->prepare($sql);

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

        $_fields = $fields != null ? $fields : '*';
        $_where = $where != null ? "WHERE $where" : "";

        $_orderby = $orderby != null ? "ORDER BY $orderby" : "";
        $statement->bindParam(":fields", $_fields);
        $statement->bindParam(":where", $_where);
        $statement->bindParam(":orderby", $_orderby);

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

    public function insert($request)
    {
        $sql = "INSERT INTO $this->table :columns VALUES :values";
        $statement = $this->connection->prepare($sql);

        $values = "(";
        $columns = "(";
        foreach($this->fields as $v){
            if(array_key_exists($v, $request)){
                $columns .= $v;
                $values .= $request[$v];
            }
        }
        $columns .= ")";
        $values .= ")";

        $statement->bindParam(':columns', $columns);
        $statement->bindParam(':values', $values);

        $statement->execute();
    }
    public function update($request)
    {
        $sql = "UPDATE $this->table SET :set WHERE id= :id;";

        $array_set = array();

        foreach($this->fields as $v){
            if(array_key_exists($v, $request)){
                $array_set[] = "$v = $request[$v]";
            }
        }

        $set = implode(", ", $array_set);

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $request['id']);
        $statement->bindParam(':set', $set);

        $statement->execute();
    }
}