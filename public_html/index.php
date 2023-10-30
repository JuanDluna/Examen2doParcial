<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix</title>
    <link rel="shortcut icon" href="img\Logo.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- link javascript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- link css -->
    <!-- iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <!-- header -->
    <header class="header">
        <a href="index.php" class="logo">SOFTIX</a>
        <?php

        session_start();


        $horaActual = date("H:i");
        $horaActual = intval(substr($horaActual, 0, -1));

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
            if ($horaActual <= 12)
                echo "<p class='saludo'>Buenos dias $usuario</p>";
            elseif ($horaActual <= 19)
                echo "<p class='saludo'>Buenas tardes $usuario</p>";
            else
                echo "<p class='saludo'>Buenas noches $usuario</p>";

        } else {
            if ($horaActual <= 12)
                echo "<p class='saludo'>Buenos dias</p>";
            elseif ($horaActual <= 19)
                echo "<p class='saludo'>Buenas tardes</p>";
            else
                echo "<p class='saludo'>Buenas noches</p>";
        }
        ?>
        <nav class="navbar">
            <a href="index.php" class="btn">Inicio</a>
            <a href="servicios.php" class="btn">Servicios</a>
            <a href="index.php#contacto" class="btn">Contacto</a>
            <?php if (isset($_COOKIE['token'])) { ?>
                <a href="vacanteForm.php" class="btn">Trabaja con nosotros</a>
            <?php } ?>
            <div class="dropdown">
                <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='bx bxs-user-circle'></i>
                </button>
                <div class="dropdown-menu">
                    <?php if (isset($_COOKIE['token'])) { ?>
                        <a class="dropdown-item" href="#">Mi cuenta</a></li>
                        <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
                    <?php } else { ?>
                        <form class="px-4 py-3" id="form_user_login" novalidate method="post">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">User: </label>
                                <input type="text" class="form-control" id="exampleDropdownFormEmail1"
                                    placeholder="nombre usuario" required name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Contraseña: </label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1"
                                    placeholder="Password" required name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a href="#" data-toggle="modal" data-target="#registerModal ">¿Nuevo? ¡Registrate!</a>

                        <div id="respuesta">

                        </div>

                    <?php } ?>
                </div>
            </div>
        </nav>
        <div class="bx bx-moon btn" id="darkMode-icon"></div>

        <div class="bx bx-menu " id="menu-icon"></div>
    </header>


    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="procesar_registro.php" novalidate method="post">
                        <div class="form-group">
                            <label for="registerName">Nombre</label>
                            <input type="text" class="form-control" id="registerName" placeholder="Ingrese su nombre"
                                required name="username">
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Correo electrónico</label>
                            <input type="email" class="form-control" id="registerEmail"
                                placeholder="Ingrese su correo electrónico" required name="useremail">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword"
                                placeholder="Ingrese su contraseña" required name="password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--inicio home-->
    <section class="home" id="home">
        <div class="home-content">
            <h3>Hola! Nosotros somos</h3>
            <h1>SOFTIX</h1>
            <p>Conoce todas las maravillas que tenemos para ti</p>

            <div class="social-media">
                <a href=""><i class='bx bxl-facebook'></i></a>
                <a href=""><i class='bx bxl-twitter'></i></a>
                <a href=""><i class='bx bxl-instagram-alt'></i></a>
                <a href=""><i class='bx bxl-whatsapp'></i></a>
            </div>

        </div>

        <div class="profession-container">
            <div class="profession-box">

                <div class="profession" style="--i:0;">
                    <i class='bx bx-code-alt'></i>
                    <h3>CAPACITATE!!</h3>
                </div>
                <div class="profession" style="--i:1;">
                    <i class='bx bxs-data'></i>
                    <h3>ADMINISTRA</h3>
                </div>
                <div class="profession" style="--i:2;">
                    <i class='bx bxl-c-plus-plus'></i>
                    <h3>DESARROLLA</h3>
                </div>
                <div class="profession" style="--i:3;">
                    <i class='bx bxs-file-html'></i>
                    <h3>DISEÑA</h3>
                </div>

                <div class="circle"></div>
            </div>

            <div class="overlay"></div>
        </div>

        <div class="home-img">
            <img src="img/home.png" alt="">
        </div>
    </section>

    <!-- acerca de nosotros -->
    <section class="about" id="#">
        <div class="about-img">
            <img src="img/about.png" alt="">
        </div>

        <div class="about-content">
            <h2 class="heading">Acerca de <span>Nosotros</span></h2>
            <h3>Inovacion tecnologica a tu alcance</h3>
            <p>En el mundo en constante evolución de la tecnología, Softix se destaca como un líder incuestionable.
                Fundada con una visión audaz en mente y una pasión por la innovación,Softix ha crecido para convertirse
                en una empresa de renombre en la industria tecnológica.</p>
            <a href="#" class="btn">Leer mas</a>
        </div>
    </section>

    <!-- Puestos -->
    <section class="services" id="#">
        <h2 class="heading">Nuestros <span>Campos</span></h2>

        <div class="services-container">
            <div class="services-box">
                <i class='bx bx-code-block'></i>
                <h3>Desarrollador de software</h3>
                <p>Soluciones personalizadas para satisfacer las necesidades comerciales específicas. Desarrollo de
                    aplicaciones
                    de escritorio, web y móviles.</p>
                <a href="#" class="btn">Leer mas</a>
            </div>
            <div class="services-box">
                <i class='bx bxs-user-circle'></i>
                <h3>Diseñador de experiencia de usuario</h3>
                <p>Creación de interfaces atractivas y funcionales que mejoran la satisfacción y
                    la usabilidad del usuario.</p>
                <a href="#" class="btn">Leer mas</a>
            </div>
            <div class="services-box">
                <i class='bx bx-devices'></i>
                <h3>Desarrollador de aplicaciones moviles</h3>
                <p>Desarrollo de aplicaciones móviles nativas y multiplataforma para iOS y Android, desde la concepción
                    hasta
                    el lanzamiento.</p>
                <a href="#" class="btn">Leer mas</a>
            </div>
            <div class="services-box">
                <i class='bx bxs-help-circle'></i>
                <h3>Consultoria en tecnologia</h3>
                <p>Asesoramiento experto para optimizar infraestructuras y estrategias tecnológicas, mejorando la
                    eficiencia
                    empresarial.</p>
                <a href="#" class="btn">Leer mas</a>
            </div>
        </div>
    </section>
    <!-- portafolio -->
    <section class="portfolio" id="#">
        <h2 class="heading">Ultimos <span>Proyectos</span></h2>
        <div class="portfolio-container">
            <div class="portfolio-box">
                <img src="img/portfolio1.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Diseño web</h4>
                    <p>Gran creatividad</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/portfolio2.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Diseño web</h4>
                    <p>Gran creatividad</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/portfolio3.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Diseño web</h4>
                    <p>Gran creatividad</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/portfolio4.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Diseño web</h4>
                    <p>Gran creatividad</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/portfolio5.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Diseño web</h4>
                    <p>Gran creatividad</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/portfolio6.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Diseño web</h4>
                    <p>Gran creatividad</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
        </div>
    </section>


    <!-- Nuestro equipo -->
    <div class="testimonial-container">
        <h2 class="heading">Nuestro <span>Equipo</span></h2>
        <div class="testimonial-wrapper">
            <div class="testimonial-box mySwiper">
                <div class="testimonial-content swiper-wrapper">
                    <div class="testimonial-slide swiper-slide">
                        <img src="img/testimonial1.jpg" alt="">
                        <h3>Juan Pablo de Luna de la Serna</h3>
                        <p>Estudiante de la Universidad Autonoma de Aguascalientes</p>
                    </div>
                    <div class="testimonial-slide swiper-slide">
                        <img src="img/testimonial2.jpg" alt="">
                        <h3>Johan Ronaldo Martinez Ramirez</h3>
                        <p>Estudiante de la Universidad Autonoma de Aguascalientes</p>
                    </div>
                    <div class="testimonial-slide swiper-slide">
                        <img src="img/testimonial3.jpg" alt="">
                        <h3>Uriel Ulises Acosta Olvera</h3>
                        <p>Estudiante de la Universidad Autonoma de Aguascalientes</p>
                    </div>
                    <div class="testimonial-slide swiper-slide">
                        <img src="img/testimonial4.jpg" alt="">
                        <h3>Johan Jose Maria renteria Zaragoza</h3>
                        <p>Estudiante de la Universidad Autonoma de Aguascalientes</p>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


    <!-- CONTACTO SECCION -->
    <section class="contact" id="contacto">
        <h2 class="heading">Quieres saber mas? <span>Contactanos!</span></h2>

        <form action="#">
            <div class="input-box">
                <input type="text" placeholder="Nombre Completo">
                <input type="email" placeholder="Correo electronico">
            </div>
            <div class="input-box">
                <input type="tel" placeholder="Numero Celular">
                <input type="text" placeholder="Direccion">
            </div>
            <textarea name="" id="" cols="30" rows="10" placeholder="Tu mensaje"></textarea>
            <input type="submit" placeholder="Enviar mensaje" class="btn">
        </form>
    </section>

    <!-- footer design -->


    <!-- scroll reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function () {
            console.log("Document ready event triggered.");

            // Captura el evento de envío del formulario
            $("#form_user_login").submit(function (e) {
                e.preventDefault(); // Evita la recarga de la página
                console.log("Formulario enviado");

                // Realiza una solicitud AJAX al archivo procesar.php
                $.post("procesar_login.php", $(this).serialize(), function (respuesta) {
                    console.log("Respuesta del servidor:", respuesta);
                    // Muestra la respuesta del servidor en el div "respuesta"
                    if (respuesta.resultado === "exito") {
                        alert("Bienvenido!");
                        location.reload(); // Reloads the current page
                    } else if (respuesta.resultado === "contrasena_incorrecta") {
                        alert("Contraseña incorrecta!");
                    } else if (respuesta.resultado === "usuario_no_encontrado") {
                        alert("Usuario no encontrado!");
                    }
                });
            });
        });
    </script>
    <!-- custom js -->
    <script src="js/script.js"></script>
</body>

</html>