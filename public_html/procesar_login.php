<?php
    // require
    require_once 'vendor/autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    define("BLANK_SPACE", " ");
    $file = "accounts.txt";
    $handle = fopen($file, "r");

    if ($handle === false){

        die("Unable to open file"); 
    }
?>
<?php

function user_authetication($username, $password, $email) {

    $handle = fopen('secretKey.txt','r');

    $payload = array(
        "username" => $username,
        "email" => $password,
        "password"=> $email,
    );

    $secret_key = fscanf($handle,"%s");
    fclose($handle);

    $token = JWT::encode($payload, $secret_key[0], 'HS256');

    setcookie("token", $token, time() + 3600,"/");
    session_start();
    $_SESSION['useremail'] = $email;
}
function request_login($login_data, $login_emails){
    
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $usernameValidation = trim($_POST["username"]);
        $passwordValidation = $_POST["password"];
        
        $i = 0;
        foreach($login_data as $recovered_username => $recovered_password){
            if($usernameValidation == $recovered_username && password_verify($passwordValidation, $recovered_password)){
                
                user_authetication($usernameValidation, $passwordValidation, $login_emails[$i]);
                return "exito";
                
                
            }
            else if($usernameValidation == $recovered_username && $passwordValidation != $recovered_password){
                return "contrasena_incorrecta";
            } 
            $i++;
        }
        return "usuario_no_encontrado";
    }
}
?>
<?php 

    $login_information = array();
    $login_emails = array();

    $i = 0;
    while(!feof($handle)){
        
        $word = fscanf($handle, "%s%s%s");
        
        if ($word){
            $key = $word[0]; //stores username
            $value = $word[1]; //stores password
            $emails = $word[2]; //stores email

            $login_credentials[$key] = $value;
            $login_emails[$i] = $emails;

            $i++;
        }
        
    }

    fclose($handle);

    $resultado = request_login($login_credentials, $login_emails);

    if($resultado === "exito"){

        $respuesta = array("resultado"=> "exito","mensaje"=> "Inicio de sesion exitoso");
    } elseif ($resultado === "contrasena_incorrecta"){
        $respuesta = array("resultado"=> "contrasena_incorrecta", "mensaje" => "Contraseña incorrecta");
    } elseif ($resultado === "usuario_no_encontrado"){
        $respuesta = array("resultado"=> "usuario_no_encontrado", "mensaje" => "Usuario no encontrado");
    }

    header('Content-Type: application/json');
    echo json_encode($respuesta);
?>