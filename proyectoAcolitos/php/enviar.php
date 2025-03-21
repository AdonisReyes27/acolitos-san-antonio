<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['message']);

    // Dirección de correo a la que se enviará el mensaje
    $destinatario = "rronaldy2000@gmail.com"; // Cambia esto por tu correo

    // Asunto del correo
    $asunto = "Nuevo mensaje de contacto de $nombre";

    // Cuerpo del correo
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Email: $email\n\n";
    $cuerpo .= "Mensaje:\n$mensaje";

    // Cabeceras del correo
    $cabeceras = "From: $email\r\n";
    $cabeceras .= "Reply-To: $email\r\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    // Envía el correo
    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
        // Redirige al usuario a una página de éxito
        header("Location: gracias.html");
        exit();
    } else {
        // Redirige al usuario a una página de error
        header("Location: error.html");
        exit();
    }
}
?>