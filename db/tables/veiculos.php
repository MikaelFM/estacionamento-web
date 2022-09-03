<?php 

require_once './methods.php';

class veiculos extends methods {

    public function __construct() {
        $this->table = 'veiculos';
    }

    public function insert($placa, $fabricante, $modelo, $cor)
    {
        $sql = "INSERT INTO $this->table (placa, fabricante, modelo, cor) VALUES (:placa, :fabricante, :modelo, :cor)";

        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':fabricante', $fabricante);
        $statement->bindParam(':modelo', $modelo);
        $statement->bindParam(':cor', $cor);

        $statement->execute();
    }
    
    public function update($id, $new_placa, $new_fabricante, $new_modelo, $new_cor)
    {
        $sql = "UPDATE $this->table SET placa= :placa, fabricante= :fabricante, modelo= :modelo, cor= :cor WHERE id= :id;";

        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':placa', $new_placa);
        $statement->bindParam(':fabricante', $new_fabricante);
        $statement->bindParam(':modelo', $new_modelo);
        $statement->bindParam(':cor', $new_cor);

        $statement->execute();
    }
}