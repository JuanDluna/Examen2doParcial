<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix: Examen de conocimientos</title>

    <link rel="shortcut icon" href="img/Logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/verificadorExamen.css">
</head>

<body>

    <?php

    session_start();

    if (isset($_SESSION['useremail'])) {
        $correo = $_SESSION['useremail'];
        $file = fopen("CodigoExamen.txt", "r");
        while (!feof($file)) {
            $linea = fgets($file);
            $linea = explode(" ", $linea);
            if ($linea[0] == "HECHO" && $linea[1] == $correo) {
                header("Location: index.php");
            } else if ($linea[0] != "HECHO" && $linea[1] == $correo) {
                $codigoUNIQ = $linea[0];
                $nohecho = true;
                break;
            }
        }
        fclose($file);
        if ($nohecho != true)
            header("Location: vacanteForm.php");
    }

    include_once "header.php";
    ?>

    <div class="container">
        <form action="examen.php" method="post">
            <div class="form-group">
                <label for="codigo">Ingresa tu código de acceso:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
                <?php if (isset($codigoUNIQ)) { ?>
                    <input type="hidden" name="codigoUNIQ" value="<?php echo $codigoUNIQ; ?>">
                <?php } ?>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>