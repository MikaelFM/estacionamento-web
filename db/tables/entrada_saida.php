<?php 

require_once './methods.php';

class entrada_saida extends methods {

    public function __construct() {
        $this->table = 'entrada_saida';
    }

    public function insert($veiculo, $hr_entrada, $hr_saida)
    {
        $sql = "INSERT INTO $this->table (veiculo, hr_entrada, hr_saida) VALUES (:veiculo, :hr_entrada, :hr_saida)";

        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':veiculo', $veiculo);
        $statement->bindParam(':hr_entrada', $hr_entrada);
        $statement->bindParam(':hr_saida', $hr_saida);

        $statement->execute();
    }
    
    public function update($id, $new_veiculo, $new_hr_entrada, $new_hr_saida)
    {
        $sql = "UPDATE $this->table SET veiculo= :veiculo, hr_entrada= :hr_entrada, hr_saida= :hr_saida WHERE id= :id;";

        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':veiculo', $new_veiculo);
        $statement->bindParam(':hr_entrada', $new_hr_entrada);
        $statement->bindParam(':hr_saida', $new_hr_saida);

        $statement->execute();
    }
}
