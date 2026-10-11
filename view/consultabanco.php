<?php
class consultabanco
{
    public function consultar()
    {
        echo '
        <h2 style="font-family: Arial, sans-serif; color: #dd0a14; font-size: 24px; margin-bottom: 15px;">Sistema de Clientes del Banco</h2>
        <form method="post">
            <label>Tipo de Cliente:</label>
            <select name="tipo_cliente" required>
                <option value="persona">Persona</option>
                <option value="empresa">Empresa</option>
            </select>
            <br><br>

            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <br><br>

            <label>Identificación (Cédula ):</label>
            <input type="text" name="identificacion" required>
            <br><br>

            <label>Edad :</label>
            <input type="text" name="extra" required>
            <br><br>

            <input type="submit" name="agregar" value="Agregar Cliente y Ver Reportes">
        </form>
        <hr>';
    }
}