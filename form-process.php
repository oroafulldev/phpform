<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "omarobre@gmail.com";
    $asunto = "Nuevo mensaje de contacto de $nombre";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo Electrónico: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje";

    // Enviar el correo
    mail($destinatario, $asunto, $contenido);

    // Redireccionar o mostrar un mensaje de éxito
    header("Location: gracias.html");
} else {
    // Manejar el acceso directo a este script de procesamiento
    echo "Acceso no permitido";
}
?>
