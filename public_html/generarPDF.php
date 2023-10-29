<?php

// Require composer autoload file
require_once __DIR__ . '/vendor/autoload.php';

// Use the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $telefono = $_POST['telefono'];
    // $foto = "data:image/png;base64," . base64_encode(file_get_contents($_POST['foto']));
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $lenguajes_programacion = implode(", ", $_POST['lenguajes_programacion']);
    $disponibilidad_viajar = $_POST['disponibilidad_viajar'];
    $disponibilidad_residencia = $_POST['disponibilidad_residencia'];
    $ingles = $_POST['ingles'];
    $puesto = $_POST['puesto'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"]) && !(empty($_FILES["file"]["tmp_name"]))) {
        mkdir("tmp");
        $targetDir = "tmp/"; // Directorio donde se guardarán las imágenes
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $typeofFoto = $_FILES["file"]["type"];

        // Verificar si el archivo es una imagen real
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            } else {
                echo "Hubo un problema al mover la foto.";
                die();
            }
        } else {
            echo "No es imagen";
            die();
        }
    } else {
        echo "Hubo un problema al subir el archivo.";
        die();
    }

    $foto64 = "data:image/$typeofFoto;base64," . base64_encode(file_get_contents($targetFile));

    $logo64 = "data:image/png;base64," . base64_encode(file_get_contents("img\Logo.png"));

    $firma64 = "data:image/png;base64," . base64_encode(file_get_contents("img/Firma.png"));

    $fecha_actual = date("d/m/Y");

    $codigoExamen = uniqid(); 
    $file = fopen("CodigoExamen.txt", "a+");
    fwrite($file, $codigoExamen . "\n");

    // Generate the HTML content

$html = "
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <style>
    body {
        display:flex;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;

    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #fff;
        column-count:3;
    }
    h1, h2 {
        color: #4682b4;
        text-align: center;
    }
    p {
        color: #000000;
        margin-left: 20px;
    }
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 25%; /* No pasa de 1/4 del ancho */
    }
</style>

</head>

<body>
    <div class='container'>
    <h1>Registro Completado</h1>
        <img src=$logo64 alt='Logo de Softix'>
        <p>Fecha: $fecha_actual</p>
        <img src=$foto64 alt='Foto del candidato'>
        <p> Estimado <strong>$nombre $apellido_paterno $apellido_materno</strong>, te damos la bienvenida a Softix. A continuación se muestran los datos que nos proporcionaste:</p>
        <p><strong>Teléfono:</strong>  $telefono </p>
        <p><strong>Fecha de Nacimiento:</strong> $dia/$mes/$anio </p>
        <p><strong>Lenguajes de Programación:</strong> $lenguajes_programacion</p>
        <p><strong>Disponibilidad para Viajar:</strong> $disponibilidad_viajar</p>
        <p><strong>Disponibilidad de Residencia:</strong> $disponibilidad_residencia</p>
        <p><strong>Inglés:</strong> $ingles</p>
        <p><strong>Puesto al que Aplica:</strong> $puesto</p>
        <h2>Felicidades!</h2>
        <p>Tu registro ha sido completado con éxito. Ahora puedes aplicar para el examen de conocimientos con tu código de
            acceso único: <strong> $codigoExamen </strong> </p>

        <center>
        <img src=$firma64 alt='Firma del CEO'>
        <p><strong>CEO. Ing. Juan De Luna</strong></p>
        </center>
    </div>
</body>

</html> ";

    // Create a new Dompdf instance
    $dompdf = new Dompdf();


    // Load HTML content into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();
    

    unlink($targetFile);
    rmdir("tmp");


    // Output the generated PDF to the browser
    $dompdf->stream();



} else {
    header("Location: index.php");
}
?>