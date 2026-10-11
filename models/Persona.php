<?php
require_once __DIR__ . "/Cliente.php";

class Persona extends Cliente
{
    private string $cedula;
    private int $edad;

    public function __construct(string $ced, string $nom, int $ed)
    {
        parent::__construct($nom);
        $this->cedula = $ced;
        $this->edad = $ed;
    }

    public function obtIdentificacion(): string
    {
        return $this->cedula;
    }

    public function obtEdad(): int
    {
        return $this->edad;
    }

    public function cumplirAnios(): void
    {
        $this->edad++;
    }
}