<?php

define("BLANK_SPACE", " ");

function userRegistration($name, $email, $password) {
    $file = "accounts.txt";
    $handle = fopen($file, 'a');

    if ($handle === false)
        die("Unable to access");

    $hash = password_hash($password, PASSWORD_BCRYPT);

    fwrite($handle, $name . BLANK_SPACE);
    fwrite($handle, $hash . BLANK_SPACE);
    fwrite($handle, $email . PHP_EOL);

    fclose($handle);
}

function userExists($name, $email) {
    $file = "accounts.txt";
    $handle = fopen($file, 'r');

    if ($handle === false) {
        die("Unable to access");
    }

    while (!feof($handle)) {
        $line = fgets($handle);
        $userData = explode(BLANK_SPACE, $line);

        if (count($userData) >= 3) {
            $storedName = $userData[0];
            $storedEmail = trim($userData[2]);

            if ($name === $storedName && $email === $storedEmail) {
                fclose($handle);
                return true; // El usuario ya existe
            }
        }
    }

    fclose($handle);
    return false; // El usuario no existe
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST["username"];
    $userEmail = $_POST["useremail"];
    $userPassword = $_POST["password"];

    if (userExists($name, $userEmail)) {
        // echo "El usuario ya existe. No se ha modificado el archivo.";
    } else {
        userRegistration($name, $userEmail, $userPassword);
        // echo "Usuario registrado con éxito.";
    }
}

header("Location: index.php");

?>
