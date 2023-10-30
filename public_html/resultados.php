<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix: Resultados</title>
    <link rel="shortcut icon" href="img\Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/resultados.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    require "respuestas.php";
    include "header.php";


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
    $_SESSION['puntaje'] = $puntaje;
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
                    <?php echo  $_SESSION['puntaje']; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="correctas">Respuestas correctas:
                    <?php echo  $_SESSION['puntaje']/10; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="incorrectas">Respuestas incorrectas:
                    <?php echo 10 -  $_SESSION['puntaje']/10; ?>
                </p>
            </div>
        </div>
        <?php
        if ($puntaje >= 60) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Felicidades, has aprobado el examen.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Lo sentimos, no has aprobado el examen.";
            echo "</div>";
        } 
        ?>
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="btn">Volver al inicio</a>
            </div>
        </div>
    </div>



    <?php
    include "footer.html";
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>