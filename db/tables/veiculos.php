<?php

require_once __DIR__ . '/../DBTable.php';

class Veiculos extends DBTable {

    public function __construct() {
        $this->table = 'veiculos';
        $this->fields = [
            'placa',
            'fabricante',
            'modelo',
            'cor'
        ];
    }
}