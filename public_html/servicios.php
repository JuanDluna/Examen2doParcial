<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix:servicios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formStyle.css">
</head>
<body>
    <?php
    include_once("header.php");
    ?>
    <div class="container">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4" style= "color: white;">Servicios</h1>
        <p class="lead" style= "color: white; background: gray; transparency: .5">consulta nuestros servicios ahora.</p>
      </div>
    </div>
    <div class="card-deck">
        <div class="card">
          <img src="img/desarrollo.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">desarrollo web</h5>
            <p class="card-text">El diseño web es un área enfocada en el desarrollo de interfaces digitales, como el diseño de sitios y aplicaciones para web. Para ello, los diseñadores web crean las páginas utilizando lenguajes de marcado como HTML.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="img\apps.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">desarrollo de aplicaciones moviles </h5>
            <p class="card-text">Desarrollo de Aplicaciones Móviles con un enfoque UX. Satisfacemos al Usuario más Exigente. Expertos en Desarrollo de Apps. Desarrollamos Aplicaciones Móviles con un enfoque UX. Outsourcing TI. RPA. Desarrollo de Apps. Inteligencia Empresarial.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="img\BDD.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">bases de datos</h5>
            <p class="card-text">Una base de datos es una recopilación organizada de información o datos estructurados, que normalmente se almacena de forma electrónica en un sistema </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
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
    </div>
    </div>
    

    <?php include_once "footer.html"; ?>

</body>
</html>