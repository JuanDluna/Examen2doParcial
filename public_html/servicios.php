<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softix:servicios</title>
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
    <link rel="stylesheet" href="css/style.css">
    <!-- iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/formStyle.css">
</head>
<body>
  <?php
    include_once("header.php");
  ?>
<!-- ACERCA DE -->
  <section class="about" id="#">
    <div class="about-img">
      <img src="img/servicios.png" alt="">
    </div>
    <div class="about-content">
            <h2 class="heading">Nuestros <span>Servicios</span></h2>
            <h3>Conoce mas acerca de nuestro trabajo</h3>
            <p>Nos enorgullece ofrecer una amplia gama de servicios de 
              alta calidad que están diseñados para satisfacer las necesidades 
              de nuestros clientes. Nuestra experiencia y compromiso con la excelencia 
              nos permiten ofrecer soluciones informáticas efectivas y personalizadas 
              para su empresa.</p>
            <a href="#imagenes" class="btn">Conoce mas ↓</a>
      </div>
    </section>
    <!-- imagenes -->
    <section class="portfolio" id="imagenes">
        <h2 class="heading">Servicios <span>Principales</span></h2>
        <div class="portfolio-container">
            <div class="portfolio-box">
                <img src="img/servicio1.png" alt="">
                <div class="portfolio-layer">
                    <h4>Software a medida</h4>
                    <p></p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/servicios2.png" alt="">
                <div class="portfolio-layer">
                    <h4>Consultoria tecnologica</h4>
                    <p></p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/servicios3.png" alt="">
                <div class="portfolio-layer">
                    <h4>Desarrollo de apps moviles</h4>
                    <p></p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/servicios4.png" alt="">
                <div class="portfolio-layer">
                    <h4>Desarrollo web y diseño</h4>
                    <p></p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/servicios5.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Mantenimiento y soporte</h4>
                    <p></p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="img/servicios6.png" alt="">
                <div class="portfolio-layer">
                    <h4>Integracion de sistemas</h4>
                    <p></p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- MAS INFO -->
  <section class="about" id="#">
    <div class="about-img">
      <img src="img/aprende.png" alt="">
    </div>
    <div class="about-content">
            <h2 class="heading">Tecnologia e <span>Innovacion</span></h2>
            <h3>SOFTIX es tu mejor lugar para aprender</h3>
            <p>"En SOFTIX, nuestra pasión radica en forjar soluciones tecnológicas 
              de vanguardia que no solo impulsan el éxito, sino que lo definen. 
              Nuestra dedicación incansable a mantenernos a la vanguardia de la innovación 
              nos permite ofrecer a su empresa lo último en avances tecnológicos.</p>
            <p>Nuestra distinción reside en nuestro enfoque inquebrantable en el cliente. 
              Comprendemos que cada empresa es única, y es por eso que personalizamos cada 
              solución para satisfacer sus necesidades específicas. Al trabajar codo a codo con usted,
               no solo somos proveedores de servicios, sino sus colaboradores, 
               creando una relación basada en confianza y compromiso.</p>
            <p>Nuestro equipo es un crisol de conocimiento técnico de élite. 
              Con experiencia en una amplia gama de tecnologías, estamos preparados para abordar desafíos 
              tecnológicos de cualquier magnitud. El dominio de la tecnología es nuestra fortaleza, 
              y lo ponemos al servicio de su empresa.En el dinámico mundo digital, somos su socio de confianza. 
              Nuestro compromiso es más que brindar servicios; es ser su guía constante en la travesía de la 
              transformación tecnológica.No espere más. Contáctenos hoy mismo y descubra cómo nuestras soluciones 
              a la medida pueden allanar el camino hacia el logro de sus metas tecnológicas. Su éxito es nuestro objetivo, 
              y estamos ansiosos por ser parte de su viaje hacia la excelencia tecnológica."</p>
      </div>
    </section>
    
    <!-- contactanos -->
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