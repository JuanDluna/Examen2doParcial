<?php

    define("BLANK_SPACE", " ");

function userRegistration($name, $email, $password){

    $file = "accounts.txt";
    $handle = fopen($file, 'a');

    if($handle === false)
        die("Unable to access");

    $hash = password_hash($password, PASSWORD_BCRYPT);
    
    fwrite($handle, $name . BLANK_SPACE);
    fwrite($handle, $hash . BLANK_SPACE);
    fwrite($handle, $email . PHP_EOL);

    fclose($handle);
}

    $file = "accounts.txt";
    $handle = fopen($file, "r");

    if ($handle === false){

        die("Unable to open file"); 
    }

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        
        $name = $_POST["username"];
        $userEmail = $_POST["useremail"];
        $userPassword = $_POST["password"];

        userRegistration($name, $userEmail, $userPassword);
    }

    $loginData = array();


    fclose($handle);

    header("Location: index.php");
?>