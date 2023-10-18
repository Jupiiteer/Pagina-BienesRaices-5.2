<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\ActiveRecord;

// Conectar a la bd
$db = conectarDb();

ActiveRecord::setDB($db);
