<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix: Resultados</title>
</head>

<body>

    <?php

    require "respuestas.php";
    // include "header.php";
    
    
$quiz = array(
    array(
        "question" => "¿Cuál de los siguientes no es un lenguaje de programación?",
        "answers" => array(
            0 => "Java",
            1 => "Windows",
            2 => "Python",
            3 => "Ruby"
        ),
        "correct_answer" => 1
    ),
    array(
        "question" => "¿Qué hace un bucle 'for' en programación?",
        "answers" => array(
            0 => "Repite un bloque de código un número fijo de veces.",
            1 => "Ejecuta código en paralelo.",
            2 => "Divide una lista en dos mitades.",
            3 => "Busca un elemento en una lista secuencialmente."
        ),
        "correct_answer" => 0
    ),
    array(
        "question" => "¿Qué es la recursión en programación?",
        "answers" => array(
            0 => "Una técnica que utiliza funciones para llamarse a sí mismas.",
            1 => "Un error que provoca un bucle infinito.",
            2 => "Una manera de eliminar variables no utilizadas.",
            3 => "Un enfoque para resolver problemas con loops anidados."
        ),
        "correct_answer" => 0
    ),
    array(
        "question" => "¿Qué es un lenguaje de programación de alto nivel?",
        "answers" => array(
            0 => "Un lenguaje con sintaxis más legible.",
            1 => "Un lenguaje muy eficiente en el uso de recursos de hardware.",
            2 => "Un lenguaje con muchas bibliotecas predefinidas.",
            3 => "Un lenguaje que permite la abstracción y portabilidad de código."
        ),
        "correct_answer" => 3
    ),
    array(
        "question" => "¿Cuál de las siguientes no es una estructura de datos?",
        "answers" => array(
            0 => "Lista enlazada",
            1 => "Pila",
            2 => "CPU",
            3 => "Árbol binario"
        ),
        "correct_answer" => 2
    ),
    array(
        "question" => "¿Qué es un IDE en programación?",
        "answers" => array(
            0 => "Una Interfaz de Desarrollo Externo.",
            1 => "Un Entorno de Desarrollo Integrado.",
            2 => "Una Interfaz de Depuración de Errores.",
            3 => "Un lenguaje de programación popular."
        ),
        "correct_answer" => 1
    ),
    array(
        "question" => "¿Cuál de las siguientes no es una estructura de control en programación?",
        "answers" => array(
            0 => "If-Else",
            1 => "HTML",
            2 => "Switch",
            3 => "While"
        ),
        "correct_answer" => 1
    ),
    array(
        "question" => "¿Qué hace el operador '==' en programación?",
        "answers" => array(
            0 => "Compara dos valores para igualdad.",
            1 => "Realiza una asignación de valor.",
            2 => "Concatena cadenas de texto.",
            3 => "Calcula una suma."
        ),
        "correct_answer" => 0
    ),
    array(
        "question" => "¿Qué es un algoritmo de ordenamiento?",
        "answers" => array(
            0 => "Un algoritmo que busca un elemento en una lista secuencialmente.",
            1 => "Un algoritmo que divide una lista en dos mitades y busca en la mitad correcta.",
            2 => "Un algoritmo que organiza elementos en una lista en un orden específico.",
            3 => "Un algoritmo que compara cada elemento con el elemento objetivo."
        ),
        "correct_answer" => 2
    ),
    array(
        "question" => "¿Qué es la programación orientada a objetos (POO)?",
        "answers" => array(
            0 => "Un enfoque para resolver problemas con loops anidados.",
            1 => "Un paradigma de programación que utiliza objetos y clases.",
            2 => "Un método para eliminar variables no utilizadas en el código.",
            3 => "Un algoritmo de búsqueda eficiente."
        ),
        "correct_answer" => 1
    )
);

    $correctas = 0;

    // Recorrer las respuestas enviadas por el usuario
    foreach ($_POST as $key => $value) {
        // Reemplazar "_" por " " en el nombre de la pregunta
        $question = str_replace("_", " ", $key);
        foreach($quiz as $pregunta => $valores){
            if($valores['question']==$question && $valores['correct_answer']==$value)  {
                $correctas++;
                echo $valores['question'] . " " . $valores['correct_answer'] . " " . $question . " " . $value . "<br>";

                echo "fue correcta <br>";
            }
        }
        
    }

    // Calcular el puntaje final
    $puntaje = $correctas * 10;

    // Mostrar el puntaje final
    echo "Tu puntaje es: " . $puntaje;



    include "footer.html";
    ?>

</body>

</html>