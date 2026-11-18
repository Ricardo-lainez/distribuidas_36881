<?php
$conexion = stream_socket_client("tcp://127.0.0.1:9000", $codigo, $error, 5);
echo "Conectado al servidor...\n";
echo "El servidor dice: " . fgets($conexion);

/*
$mensaje = fgets($conexion);
echo "El servidor dice: $mensaje\n";
*/

while (($linea = fgets(STDIN)) !== false) {
    fwrite($conexion, $linea);
    echo "La respuesta es = " . fgets($conexion);
}

fclose($conexion);