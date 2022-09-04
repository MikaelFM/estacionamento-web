<?php

require_once __DIR__ . '/../db/tables/Entrada_saida.php';
require __DIR__ . '/../db/tables/Usuarios.php';
require __DIR__ . '/../db/tables/Veiculos.php';

define("entrada_saida", new Entrada_saida());
define("usuarios", new Usuarios());
define("veiculos", new Veiculos());
