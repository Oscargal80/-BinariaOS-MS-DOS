<?php

// Header y redirect
header('Refresh: 1; URL=http://binariaos.com.py/thankyou');
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);

// HTML aqui-
$string =  '<!DOCTYPE html>' . '<html lang="es">' . '  <head>' . ' <link rel="stylesheet" href="css/bootstrap.css" media="screen">' . '  </head>' . '  <body>';
echo "Favor espere, estamos procesando su mensaje...";
'  </body>' . '</html>';
echo $string;
header('Content-type: application/json');

/*
 *Formulario
*/
// check email
if (isset($_POST['submit_message'])) {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $email = filter_var(@$_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlentities($name);
    $message = htmlentities($message);
    // Validar datos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 50) {
        http_response_code(403);
        $response['error']['email'] = "Correro valido requerido";
    }
    if (empty($name)) {
        http_response_code(403);
        $response['error']['name'] = 'Nombre requerido';
    }
    if (empty($message)) {
        http_response_code(403);
        $response['error']['message'] = 'Mensaje vacio';
    }
    if (!isset($response['error']) || $response['error'] === '') {
        $content = "Nombre: " . $name . " \r\nEmail: " . $email . " \r\nMensaje: " . $message;
        $content = str_replace(array('<', '>'), array('&lt;', '&gt;'), $content);
        $name = str_replace(array('<', '>'), array('&lt;', '&gt;'), $name);
        $message = str_replace(array('<', '>'), array('&lt;', '&gt;'), $message);
        $recipient = "info@binariaos.com.py";
        // Asunto
        $subject = "Desde Fomulario de Contacto " . $name;
        // Contenido
        $email_content = $message . "\n \n";
        $email_content.= "Saludos,";
        $email_content.= "De: $name\n\n";
        $email_content.= "Email: $email\n\n";
        // Cabecera
        $email_headers = "MIME-Version: 1.0" . "\r\n";
        $email_headers.= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $email_headers.= "De: $name <$email>" . "\r\n";
        $email_headers.= "Respuesta: <$email>";
        // Enviar email
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            //200 (ok)
            http_response_code(200);
            $response['success'] = 'Gracias, su mensaje ha sido enviado.';
        } else {
            // 500 (internal server error)
            http_response_code(500);
            $response['error'] = 'Error al enviar, intente de nuevo.';
            $content = 'No pudimos entregar su mensaje' . "\r\n" . $content;
        }
    } else {
        // 403 (error) forbidden response
        http_response_code(403);
        $response['error'] = '<ul>' . $response['error'] . '</ul>';
        
    }
    $response['email'] = $email;
    $response['form'] = 'submit_message';
}

// Suscripcion
if (isset($_POST['submit_email'])) {
    $email = filter_var(@$_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 50) {
        $response['error']['email'] = "Correro valido requerido";
    }
    if (!isset($response['error']) || $response['error'] === '') {
        $email = str_replace(array('<', '>'), array('&lt;', '&gt;'), $email);
        $recipient = "info@binariaos.com.py";
        // Subject.
        $subject = "Nueva subscription";
        // Contenido.
        $email_content = "Hello \n Form de Suscripcion.\n";
        $email_content.= "Email: $email\n\n";
        $email_content.= "Saludos,";
        // Cabecera.
        $email_headers = "MIME-Version: 1.0" . "\r\n";
        $email_headers.= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $email_headers.= "De: <$email>" . "\r\n";
        // Enviar.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            $response['success'] = "Gracias, su correo ha sido notificado.";
        } else {
            http_response_code(500);
            $response['error'] = "Error al enviar, intente de nuevo.";
        }
        file_put_contents("email.txt", $email . " \r\n", FILE_APPEND | LOCK_EX);
    }
    $response['email'] = $email;
    $response['form'] = 'submit_email';
}
?>