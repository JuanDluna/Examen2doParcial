<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix:Vacantes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formStyle.css">

</head>

<body>
    <div class="header">
        <?php
        if (!isset($_COOKIE['token']))
            header("Location: index.php");



        include_once "header.php";
        ?>
    </div>

    <div class="container">
        <form action="generarPDF.php" method="post" enctype="multipart/form-data">
            <div class="nombre">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido_paterno">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                </div>

                <div class="form-group">
                    <label for="apellido_materno">Apellido Materno:</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                </div>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="file">Foto de identificación:</label>
                <input type="file" id="file" name="file" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>

                <div class="row">
                    <div class="col">
                        <select id="dia" name="dia" class="form-control" required>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <select id="mes" name="mes" class="form-control" required>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col">
                        <select id="anio" name="anio" class="form-control" required>
                            <?php
                            $anio_actual = date("Y");
                            for ($i = $anio_actual - 18; $i >= ($anio_actual - 65); $i--) {
                                // For establecido para que el trabajador tenga al menos 18 años y no más de 65
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group opcProgramming">
                <label for="lenguajes_programacion">Lenguajes de Programación:</label><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="java" name="lenguajes_programacion[]"
                        value="Java">
                    <label class="form-check-label" for="java">Java</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="php" name="lenguajes_programacion[]"
                        value="PHP">
                    <label class="form-check-label" for="php">PHP</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="python" name="lenguajes_programacion[]"
                        value="Python">
                    <label class="form-check-label" for="python">Python</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="javascript" name="lenguajes_programacion[]"
                        value="JavaScript">
                    <label class="form-check-label" for="javascript">JavaScript</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="csharp" name="lenguajes_programacion[]"
                        value="C#">
                    <label class="form-check-label" for="csharp">C#</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ruby" name="lenguajes_programacion[]"
                        value="Ruby">
                    <label class="form-check-label" for="ruby">Ruby</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="swift" name="lenguajes_programacion[]"
                        value="Swift">
                    <label class="form-check-label" for="swift">Swift</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="go" name="lenguajes_programacion[]" value="Go">
                    <label class="form-check-label" for="go">Go</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rust" name="lenguajes_programacion[]"
                        value="Rust">
                    <label class="form-check-label" for="rust">Rust</label>
                </div>
            </div>

            <div class="form-group">
                <label for="disponibilidad_viajar">Disponibilidad para Viajar:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="si_viajar" name="disponibilidad_viajar" value="Si"
                        required>
                    <label class="form-check-label" for="si_viajar">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="no_viajar" name="disponibilidad_viajar" value="No"
                        required>
                    <label class="form-check-label" for="no_viajar">No</label>
                </div>
            </div>

            <div class="form-group">
                <label for="disponibilidad_residencia">Disponibilidad de Residencia:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="si_residencia" name="disponibilidad_residencia"
                        value="Si" required>
                    <label class="form-check-label" for="si_residencia">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="no_residencia" name="disponibilidad_residencia"
                        value="No" required>
                    <label class="form-check-label" for="no_residencia">No</label>
                </div>
            </div>

            <div class="form-group">
                <label for="ingles">Inglés:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ingles" id="ninguno" value="Ninguno">
                    <label class="form-check-label" for="ninguno">Ninguno</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ingles" id="basico" value="Básico">
                    <label class="form-check-label" for="basico">Básico</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ingles" id="intermedio" value="Intermedio">
                    <label class="form-check-label" for="intermedio">Intermedio</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ingles" id="avanzado" value="Avanzado">
                    <label class="form-check-label" for="avanzado">Avanzado</label>
                </div>
            </div>

            <div class="form-group">
                <label for="puesto">Puesto al que Aplica:</label>
                <select id="puesto" name="puesto" class="form-control" required>
                    <option value="Desarrollador Web">Desarrollador Web (Back-End)</option>
                    <option value="Diseñador Web">Diseñador Web (Front-End)</option>
                    <option value="Desarrollador Móvil">Desarrollador Móvil</option>
                    <option value="Desarrollador de Software">Desarrollador de Software</option>
                    <option value="Diseñador Gráfico">Diseñador Gráfico</option>
                    <option value="Administrador de Sistemas">Administrador de Sistemas</option>
                    <option value="Analista de Datos">Analista de Datos</option>
                    <option value="Ingeniero de Redes">Ingeniero de Redes</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="enviar" disabled>Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        // Obtener los checkboxes
        var checkboxes = document.querySelectorAll('input[type=checkbox]');
        // Obtener el botón de enviar
        var enviar = document.getElementById('enviar');

        // Agregar un listener a cada checkbox
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                // Verificar si al menos uno está seleccionado
                var unoSeleccionado = false;
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        unoSeleccionado = true;
                    }
                });

                // Habilitar o deshabilitar el botón de enviar
                if (unoSeleccionado) {
                    enviar.disabled = false;
                } else {
                    enviar.disabled = true;
                }
            });
        });
    </script>

</body>

</html>