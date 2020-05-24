<?php

require_once('config.php');

?>
<!DOCTYPE html>

<html lang="es">
  <head>
    <title><?php echo $siteTitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/logo.png"/>
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <!-- End swiper -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customSwipper.css">


  </head>
    <body>
      <main>
            <!-- MENU DE NAVEGACIÓN -->
            <?php include 'Header.php'; ?>

            <div class="btn-whatsapp">
              <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>" target="_blank">
              <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" style="width: 40px"  alt="Whatsapp">
              </a>
            </div>


            <div class="swiper-container">
              <div class="swiper-wrapper">
              <div class="swiper-slide">
                  <?php include 'player.php' ?>
              </div>
              
                <?php
                  foreach($radios as $radio => $detalles)
                  {
                ?>
                  <div class="swiper-slide">
                    <div class="container-fluid">
                      <a  href="<?php echo ($radios[$radio]['url']) ?>">
                        <div id="subdominios" class="row d-flex align-items-center">
                          <img class="logoSubRadios" src="<?php echo ($radios[$radio]['img']) ?>" alt="<?php echo ($radios[$radio]['alt']) ?>">  
                          <h3><?php echo ($radios[$radio]['alt']) ?></h3>
                        </div>  
                      </a>
                    </div>
                  </div>
                <?php } ?>
              
               
                
              </div>
              <!-- Add Pagination -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>



            <!-- IMAGEN PRINCIPAL -->
            <?php include 'Banner.php' ?>


            <!-- PROGRAMACION -->
            <?php include 'programacion.php'; ?>

            <!-- SOBRE NOSOTROS -->
            <?php include 'sobreNosotros.php'; ?>

            <!-- NOS APOYAN -->
            <?php include 'nosApoyan.php'; ?>

            <!-- NUESTRAS REDES SOCIALES -->
            <?php include 'nuestrasRedes.php'; ?>

            <!-- BARRA DE REDES SOCIALES -->
            <?php include 'BarraRedes.php'; ?>

            <!-- FOOTER -->
            <?php include 'Footer.php'; ?>

        </div>
        <div id="fb-root"></div>
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/js/swiper.js"></script>
        <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
        <script>
          var swiper = new Swiper('.swiper-container', {
              direction: 'vertical',
              slidesPerView: 1,
              spaceBetween: 30,
              mousewheel: true,
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
          });
        </script>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/mediaelement-and-player.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/circleaudioplayer.js"></script>
        <script src="js/main.js"></script>

        

        <!-- <script type="text/javascript" src="js/scriptMobile.js"></script> -->
    </main>
  </body>
</html>
