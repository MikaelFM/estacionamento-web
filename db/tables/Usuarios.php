<?php

require __DIR__ . '/../tables.php';

class Usuarios extends Table {

    public function __construct() {
        $this->table = 'usuarios';
        $this->fields = [
            'username',
            'password',
        ];
    }
}