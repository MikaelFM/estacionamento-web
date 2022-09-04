<?php

require_once __DIR__ . '/connection.php';

class DBTable
{

    public $table;
    public $fields;

    public function get_all()
    {
        $sql = "SELECT * FROM $this->table";

        $statement = connection->prepare($sql);

        $statement->execute();

        $resultado = array();

        while ($item = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($resultado, $item);
        }

        return $resultado;
    }

    public function get_where($fields = null, $where = null, $orderby = null)
    {
        $_fields = $fields != null ? $fields : '*';
        $_where = $where != null ? 'WHERE '. $where : "";
        $_orderby = $orderby != null ? 'ORDER BY '. $orderby : "";

        $sql = "SELECT $_fields FROM $this->table $_where $_orderby";
        $statement = connection->prepare($sql);

        $resultado = array();

        while ($item = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($resultado, $item);
        }

        return $resultado;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";

        $statement = connection->prepare($sql);
        $statement->bindParam(":id",  $id);

        $statement->execute();
    }

    public function insert($request)
    {
        $columns_array = array();
        $values_array = array();

        foreach($this->fields as $v){
            if(array_key_exists($v, $request)){
                $columns_array[] = $v;
                $values_array[] = "'$request[$v]'";
            }
        }

        $columns = implode(", ", $columns_array);
        $values = implode(", ", $values_array);


        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $statement = connection->prepare($sql);
        $statement->execute();
    }
    public function update($request)
    {
        $sql = "UPDATE $this->table SET :set WHERE id= :id;";

        $array_set = array();

        foreach($this->fields as $v){
            if(array_key_exists($v, $request)){
                $array_set[] = "$v = '$request[$v]'";
            }
        }
        $set = implode(", ", $array_set);

        $sql = "UPDATE $this->table SET $set WHERE id= :id;";

        $statement = connection->prepare($sql);
        $statement->bindParam(':id', $request['id']);
        $statement->execute();
    }
}