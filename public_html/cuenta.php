<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix:servicios</title>
    <link rel="shortcut icon" href="img\Logo.png" type="image/x-icon">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- link javascript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- link css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/formStyle.css">
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['useremail'])) {
        $correo = $_SESSION['useremail'];
        $file = fopen("accounts.txt", "r");
        while (!feof($file)) {
            $linea = fgets($file);
            $linea = explode(" ", $linea);
            $linea[2] = trim($linea[2]);
            if ($linea[2] == $correo) {
                $usuario = $linea[0];
                break;
            }
        }
        fclose($file);

        $file = fopen("CodigoExamen.txt", "r");
        $codigo = "";

        while (!feof($file)) {
            $linea = fgets($file);
            $linea = explode(" ", $linea);
            $linea[1] = trim($linea[1]);
            if ($linea[1] == $correo) {
                $codigo = $linea[0];
                break;
            }
        }
    }

    include_once("header.php");
    ?>
    <br><br><br>
    <section class="services" id="#">
        <h2 class="heading">Nuestros <span>Campos</span></h2>

        <div class="services-container">
            <div class="services-box">
                <i class='bx bxs-user-circle'></i>
                <h3>Mis <span>datos</span></h3>
                <?php
                echo "<p><span>Nombre:</span> $usuario</p>";
                echo "<p><span>Correo:</span> $correo</p>";
                ?>
            </div>
            <div class="services-box">
                <i class='bx bx-code-block'></i>
                <h3><span>Mi</span> resultado</h3>
                <?php
                if($codigo != "HECHO"){
                    echo "<p><span>Codigo de examen: </span> $codigo </p>";
                }else{
                    echo "<p><span>Estatus de examen: </span> $codigo </p>";
                    if (isset($_SESSION['puntaje']) && $codigo == "HECHO") {
                        echo "<p><span>Puntaje:</span> " . $_SESSION['puntaje'] . "</p>";
                    }
                }
                ?>
            </div>
        </div>

        <br><br><br>
        <center>
            <a href="index.php" class="btn">Ir a Inicio</a>
        </center>

    </section>

    <?php include_once "footer.html"; ?>

</body>

</html>