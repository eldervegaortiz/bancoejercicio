<?php
session_start();

require_once __DIR__ . "/models/Banco.php";
require_once __DIR__ . "/models/Persona.php";
require_once __DIR__ . "/models/Empresa.php";

require_once __DIR__ . "/view/consultabanco.php";
require_once __DIR__ . "/view/visualizarbanco.php";
require_once __DIR__ . "/controller/controladorbanco.php";

$consulta = new consultabanco();
$consulta->consultar();

$vista = new visualizarbanco();
$controlador = new controladorbanco($vista);
$controlador->desarrollar();