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
                    echo "Esta validacion sigue funcionando, tranquilo";
                    // header("Location: index.php");
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

    echo "<form action='' method='post' class='needs-validation' novalidate>";
    // Display the questions
    foreach ($quiz as $key => $value) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h3 class='card-title'>" . ($key + 1) . ". " . $value['question'] . "</h3>";
        echo "<ul class='list-group list-group-flush'>";
        foreach ($value['answers'] as $option => $answer) {
            echo "<li class='list-group-item'>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='radio' name='pregunta" . ($key + 1) . "' value='" . $option . "'>";
            echo "<label class='form-check-label'>" . $answer . "</label>";
            echo "</div>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "</div>";
    }
    echo "<button type='submit' class='btn btn-primary'>Submit</button>";
    echo "</form>";




    include "footer.html";
    ?>



    <script>
        window.addEventListener("beforeunload", function (event) {
            event.preventDefault();
            
            event.returnValue = "";
            if(window.confirm("¿De verdad quieres salir? No podrás volver a hacer el examen o seguir con el intento.")){
                window.location.href = "index.php";
            }	
            (event || window.event).returnValue = confirmationMessage;
            return confirmationMessage;
        });
    </script>


</body>

</html>