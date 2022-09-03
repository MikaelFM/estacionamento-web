<?php

require __DIR__ . '/../tables.php';

class Veiculos extends Table {

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