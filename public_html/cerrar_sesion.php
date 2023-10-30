<?php

    setcookie("token", "", time() - 1); 
    echo "<script>
    // Eliminar la cookie del token en el lado del cliente
        document.cookie = 'token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    </script>";
if(isset($_COOKIE["token"])){
    // var_dump($_COOKIE["token"]);
        var_dump(json_decode($_COOKIE["token"]));
        echo "mi papa es gay";
        setcookie("token", $_COOKIE["token"], time() -1);
    }
    header("Location: index.php");
?>
