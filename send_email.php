<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $tema = $_POST["tema"];
    $mensaje = $_POST["mensaje"];

    // Dirección de correo electrónico a la que se enviará el mensaje
    $destinatario = "matias.fballesteros@gmail.com"; // Reemplaza con tu dirección de correo electrónico

    // Asunto del correo electrónico
    $asunto = "Nuevo mensaje de contacto de $nombre: $tema";

    // Construir el cuerpo del mensaje
    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje .= "Email: $email\n";
    $cuerpoMensaje .= "Tema: $tema\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje";

    // Cabeceras del correo electrónico
    $cabeceras = "From: $email\r\n";
    $cabeceras .= "Reply-To: $email\r\n";

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $cuerpoMensaje, $cabeceras)) {
        echo "El mensaje se ha enviado correctamente.";
    } else {
        echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de contacto
    header("Location: index.html");
    exit();
}
?>