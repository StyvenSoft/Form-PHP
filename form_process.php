<?php
#print_r($_POST);
$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "El nombre es obligatorio!";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/" , $name )) {
           $name_error= "Solo se acepta letras y espacios";
        }
    }

if (empty($_POST["email"])) {
    $email_error = "El email es obligatorio!";
    }else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "El formato del email es invalido!";
        }
    }
if (empty($_POST["phone"])) {
    $phone_error = "El telefono es obligatorio!";
    }else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[3|6|7][0-9]{9}$/",$phone)) {
            $phone_error = "El formato del telefono es invalido!";
        }
    }
if (empty($_POST["url"])) {
    $url_error = "La URL es obligatoria!";
    }else {
        $url = test_input($_POST["url"]);
        if (!preg_match("/^((https|http|ftp)\:\/\/)?([a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4}|[a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4}|[a-z0-9A-Z]+\.[a-zA-Z]{2,4})$/i",$url)) {
            $url_error = "El formato URL es invalido!";
        }
    }
if (empty($_POST["message"])) {
    $message = "";
    }else {
        $message = test_input($_POST["message"]);
    }

if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '') {
    $message_body = '';
    unset($_POST['submit']);
    foreach ($_POST as $key => $value) {
        $message_body .= "$key: $value\n";
    }
        $to = 'steveen.echeverri@gmail.com';
        $subject = 'Contact from ' . $name;
        if(mail($to, $subject, $message_body)){
            $success = "Mensaje enviado, gracias por contactarnos!";
            $name = $email = $phone = $message = $url = '';
        }else{
            echo"Fallo el servicio de envio, intente mas tarde.";
        }
    }
}

function test_input($data){

    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>