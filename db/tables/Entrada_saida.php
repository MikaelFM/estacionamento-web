<?php

require __DIR__ . '/../tables.php';

class Entrada_saida extends Table {

    public function __construct() {
        $this->table = 'entrada_saida';
        $this->fields = [
            'veiculo',
            'hr_entrada',
            'hr_saida'
        ];
    }
}