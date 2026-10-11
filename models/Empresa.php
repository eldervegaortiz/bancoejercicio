<?php
require_once __DIR__ . "/Cliente.php";

class Empresa extends Cliente
{
    private string $nit;
    private string $representante;

    public function __construct(string $nit, string $nom, string $r)
    {
        parent::__construct($nom);
        $this->nit = $nit;
        $this->representante = $r;
    }

    public function obtIdentificacion(): string
    {
        return $this->nit;
    }

    public function obtRepresentante(): string
    {
        return $this->representante;
    }

    public function cambiarRepres(string $repres): void
    {
        $this->representante = $repres;
    }
}