<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix: Resultados</title>
    <link rel="shortcut icon" href="img\Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/resultados.css">
</head>

<body>

    <?php

    require "respuestas.php";
    // include "header.php";


    $correctas = 0;

    // Recorrer las respuestas enviadas por el usuario
    foreach ($_POST as $key => $value) {
        // Reemplazar "_" por " " en el nombre de la pregunta
        $question = str_replace("_", " ", $key);
        foreach ($quiz as $pregunta => $valores) {
            if ($valores['question'] == $question && $valores['correct_answer'] == $value) {
                $correctas++;
            }
        }

    }

    // Calcular el puntaje final
    $puntaje = $correctas * 10;
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="titulo">Resultados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="puntaje">Puntaje:
                    <?php echo $puntaje; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="correctas">Respuestas correctas:
                    <?php echo $correctas; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="incorrectas">Respuestas incorrectas:
                    <?php echo 10 - $correctas; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="btn">Volver al inicio</a>
            </div>
        </div>
    </div>




    <?php
    include "footer.html";
    ?>



</body>

</html>