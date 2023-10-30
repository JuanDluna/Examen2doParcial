<head>
    <link rel="shortcut icon" href="img/Logo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <!-- header -->
    <header class="header">
        <a href="index.php" class="logo">SOFTIX</a>
        <?php

            $horaActual = date("H:i");
            $horaActual = intval(substr( $horaActual,0,-1));

            if ($horaActual <= 12) { ?>
                <p>Buenos dias</p>
                
            <?php } elseif ($horaActual <= 19) { ?>
                <p>Buenas tardes</p>

            <?php }else { ?>
                <p>Buenas noches</p>
                
            <?php } 
        ?>    
        <nav class="navbar">
            <a href="index.php" class="btn">Inicio</a>
            <a href="servicios.php" class="btn">Servicios</a>
            <a href="index.php#contacto" class="btn">Contacto</a>
            <?php if (isset($_COOKIE['token'])) { ?>
            <a href="vacanteForm.php" class="btn">Trabaja con nosotros</a>
            <?php }?>
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
                    <form>
                        <div class="form-group">
                            <label for="registerName">Nombre</label>
                            <input type="text" class="form-control" id="registerName" placeholder="Ingrese su nombre">
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Correo electrónico</label>
                            <input type="email" class="form-control" id="registerEmail"
                                placeholder="Ingrese su correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword"
                                placeholder="Ingrese su contraseña">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
</body>