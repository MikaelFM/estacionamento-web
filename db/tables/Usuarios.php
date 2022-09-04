<?php

require_once __DIR__ . '/../DBTable.php';

class Usuarios extends DBTable {

    public function __construct() {
        $this->table = 'usuarios';
        $this->fields = [
            'username',
            'password',
        ];
    }
}