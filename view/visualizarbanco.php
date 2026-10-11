<?php
class visualizarbanco
{
    public function mostrarReportes(Banco $banco)
    {
        echo "<h2>Reportes Oficiales: " . $banco->obtNombre() . "</h2>";

        // Todos los nombres de los clientes que tiene el banco
        echo "<h3>1. Nombres de los clientes del banco:</h3><ul>";
        foreach ($banco->obtClientes() as $cliente) {
            echo "<li>" . $cliente->obtNombre() . "</li>";
        }
        echo "</ul>";

        // nombres y cédulas de las personas clientes del banco
        echo "<h3>2. Nombres y cédulas de las personas clientes:</h3><ul>";
        $hayPersonas = false;
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                echo "<li>Nombre: {$cliente->obtNombre()} - Cédula: {$cliente->obtIdentificacion()}</li>";
                $hayPersonas = true;
            }
        }
        if (!$hayPersonas) echo "<li>No hay personas registradas.</li>";
        echo "</ul>";

        // representante de cada empresa
        echo "<h3>3. Nombre y representante de cada empresa:</h3><ul>";
        $hayEmpresas = false;
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Empresa) {
                echo "<li>Empresa: {$cliente->obtNombre()} - Representante: {$cliente->obtRepresentante()}</li>";
                $hayEmpresas = true;
            }
        }
        if (!$hayEmpresas) echo "<li>No hay empresas registradas.</li>";
        echo "</ul>";

        // 4. Clientes menores de edad
        echo "<h3>4. Nombres de los clientes menores de edad (< 18 años):</h3><ul>";
        $hayMenores = false;
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona && $cliente->obtEdad() < 18) {
                echo "<li>{$cliente->obtNombre()} (Edad: {$cliente->obtEdad()} años)</li>";
                $hayMenores = true;
            }
        }
        if (!$hayMenores) {
            echo "<li>No hay clientes menores de edad.</li>";
        }
        echo "</ul>";

        //  Cliente más joven y más viejo 
        $masJoven = null;
        $masViejo = null;

        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                if ($masJoven === null || $cliente->obtEdad() < $masJoven->obtEdad()) {
                    $masJoven = $cliente;
                }
                if ($masViejo === null || $cliente->obtEdad() > $masViejo->obtEdad()) {
                    $masViejo = $cliente;
                }
            }
        }

        echo "<h3>5. El cliente más joven:</h3>";
        if ($masJoven) {
            echo "<p>Nombre: {$masJoven->obtNombre()} | Edad: {$masJoven->obtEdad()} años</p>";
        } else {
            echo "<p>No hay datos suficientes.</p>";
        }

        echo "<h3>6. El cliente más viejo:</h3>";
        if ($masViejo) {
            echo "<p>Nombre: {$masViejo->obtNombre()} | Edad: {$masViejo->obtEdad()} años</p>";
        } else {
            echo "<p>No hay datos suficientes.</p>";
        }
    }

    public function mostrartitulo($titulo)
    {
        echo "== {$titulo} ==<br>";
    }
}