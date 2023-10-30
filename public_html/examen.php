<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix: Examen de conocimientos</title>
    <link rel="shortcut icon" href="img\Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/Quiz.css">
</head>

<body>
    <?php
    session_start();
    include_once "header.php";
    require_once "respuestas.php";

    if (isset($_SESSION['useremail'])) {
        
        $correo = $_SESSION['useremail'];
        // Abrir el archivo en modo lectura y escritura
        $file = fopen("CodigoExamen.txt", "r+");
        // Leer el contenido del archivo y almacenarlo en un array
        $fileContent = file("CodigoExamen.txt");
        // Buscar la línea que contiene el correo de la variable $correo
        foreach ($fileContent as &$line) {
            if (strpos($line, $correo) !== false) {
                $codigo = explode(" ", $line);
                if($codigo[0] == "HECHO"){
                    header("Location: resultados.php");
                }else{
                    // Si se encuentra el correo, modificar el código de acceso
                    $line = str_replace($codigo[0],"HECHO", $line);
                }
                break;
            }
        }
        unset($line);
        // Escribir el contenido actualizado en el archivo
        file_put_contents("CodigoExamen.txt", implode("", $fileContent));
    }else{
        die("No se accedió correctamente al examen.");
    }
    // Shuffle the questions and answers
    foreach ($quiz as &$question) {
        shuffle($question['answers']);
    }
    unset($question);
    shuffle($quiz);

    echo "<form action='resultados.php' method='post'>";
    // Display the questions
    foreach ($quiz as $key => $value) {
        echo "<div class='question'>";
        $question = $value['question'];
        echo "<h3 class='question-title'><label for='$question'>" . ($key + 1) . ". " . $value['question'] . "</label></h3>";
        echo "<ul class='question-options'>";
        foreach ($value['answers'] as $option => $answer) {
            echo "<li class='question-option'>";
            echo "<div class='question-option-container'>";
            echo "<input type='radio' name='$question' id='pregunta" . ($key + 1) . "-" . $option . "' value='" . $answer. "'>";
            echo "<label for='pregunta" . ($key + 1) . "-" . $option . "'  class='question-option-label'>" . $answer . "</label>";
            echo "</div>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    echo "<button type='submit'>Submit</button>";
    echo "</form>";

    include "footer.html";
    ?>
    <script>
        window.addEventListener('beforeunload', function (e) {
            e.preventDefault();
            e.returnValue = '';
        });
    </script>
</body>

</html>