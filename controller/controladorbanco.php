<?php
require_once __DIR__ . "/../models/Banco.php";
require_once __DIR__ . "/../models/Persona.php";
require_once __DIR__ . "/../models/Empresa.php";

require_once __DIR__ . "/../view/visualizarbanco.php";
require_once __DIR__ . "/../view/consultabanco.php";

class controladorbanco
{
    private $vista;

    public function __construct(visualizarbanco $vista)
    {
        $this->vista = $vista;
    }

    public function desarrollar()
    {
        $banco = new Banco("Banco Central Cooperativo");

        // Opcional para que salgan algunas personas
        $banco->adCliente(new Persona("10987654", "raton perez", 45));
        $banco->adCliente(new Persona("10234567", "elder  vega", 16)); 
        $banco->adCliente(new Empresa("900123456-1", "Tech Solutions S.A.S.", "Marcela Duarte"));

        // Si el usuario envió datos desde el formulario, podemos agregarlos aquí dinámicamente
        if (isset($_POST["agregar"])) {
            $tipo = $_POST["tipo_cliente"] ?? '';
            $nombre = $_POST["nombre"] ?? '';
            $id = $_POST["identificacion"] ?? '';
            $extra = $_POST["extra"] ?? '';

            if (!empty($nombre) && !empty($id)) {
                if ($tipo === "persona") {
                    $banco->adCliente(new Persona($id, $nombre, (int)$extra));
                } elseif ($tipo === "empresa") {
                    $banco->adCliente(new Empresa($id, $nombre, $extra));
                }
            }
        }

        // Mostramos el reporte actual
        $this->vista->mostrartitulo("ESTADO ACTUAL DEL BANCO");
        $this->vista->mostrarReportes($banco);
    }
}