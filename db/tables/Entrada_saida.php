<?php

require_once __DIR__ . '/../DBTable.php';

class Entrada_saida extends DBTable {

    public function __construct() {
        $this->table = 'entrada_saida';
        $this->fields = [
            'veiculo',
            'hr_entrada',
            'hr_saida'
        ];
    }
}