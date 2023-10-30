<?php

// Require composer autoload file
require_once __DIR__ . '/vendor/autoload.php';


// Use the Dompdf namespace
use Dompdf\Dompdf;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



if ($_SERVER["REQUEST_METHOD"] != "POST")
    header("Location: index.php");

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

if (isset($_FILES["file"]) && !(empty($_FILES["file"]["tmp_name"]))) {
    if (!file_exists("tmp")) {
        mkdir("tmp");
    }
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
        .container {
            width: 80%;
            margin: auto;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        h1, h2, h3 {
            text-align: center;
            color: #333;
        }

        .codigo {
            background-color: #f9f9f9;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
        }

        img {
            max-width: 100%;
        }

</style>
</head>

<body>
    <div class='container'>
        <table>
            <tr>
                <td><img src=$logo64 alt='Logo de Softix'</td>
                <td>
                    <h1>Registro Completado</h1> 
                    <h3>'El software inteligente para gente inteligente'</h3>

                </td>
                <td>$fecha_actual</td>
            </tr>
            <tr>
                <td colspan='3' Estimado <strong>$nombre $apellido_paterno $apellido_materno</strong>, te damos la bienvenida a Softix. A continuación se muestran los datos que nos proporcionaste:</td>
            </tr>
            <tr>
                <td><img src=$foto64 alt='Foto del candidato'></td>
                <td>
                <strong>Teléfono:</strong>  $telefono <br>
                <strong>Fecha de Nacimiento:</strong> $dia/$mes/$anio <br>
                <strong>Lenguajes de Programación:</strong> $lenguajes_programacion<br>
                <strong>Disponibilidad para Viajar:</strong> $disponibilidad_viajar
                    
                </td>
                <td>
                <strong>Disponibilidad de Residencia:</strong> $disponibilidad_residencia  <br>
                <strong>Inglés:</strong> $ingles <br>
                <strong>Puesto al que Aplica:</strong> $puesto
                <td> 
            </tr>
            <tr>
                <td colspan='3'>
                    <h2><center>¡Un paso menos!</center></h2>
                Tu registro ha sido completado con éxito. Ahora puedes aplicar para el examen de conocimientos con tu código de acceso único:
                </td>
            </tr>
            <tr>
                <td colspan='3' class='codigo'<h3><center> $codigoExamen </center></h3></td>
            </tr>
            <tr>
                <td colspan='3'>
                    <center>
                        <img src=$firma64 alt='Firma del CEO' width=50%>
                        <hr>
                        <strong>CEO. Ing. Juan De Luna</strong>
                    </center>
                </td>
            </tr>
        </table>
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

if(isset($_COOKIE["token"])){
    $handle = fopen('secretKey.txt','r');
    $jwt =  "token";
    $secret_key = fscanf($handle,"%s");
    $array  = 'HS256';
    fclose($handle);

    try {
        $decoded = JWT::decode($jwt, $secret_key[0], $array);
    
    
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    echo "Decoded token: " . $decoded_token;
}



// Output the generated PDF to the browser
// $dompdf->stream();

// header("Location: verificadorExamen.php");

?>