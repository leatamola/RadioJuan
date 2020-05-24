  <nav class="site-wrap fixed-top">
  <nav class="site-navbar navbar-expand-lg <?php echo $backgroundColorHeader ?>  ">
        <div id="content-desktop" class="container-fluid">
          <div class="row align-items-center">
            <div class="col">
              <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="<?php echo $titleSize ?>" style="width:70px">
              </a>
            </div>
            <div class="col-6 text-center">
              <nav class="site-navigation" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block ">
                  <li class="active">
                    <a href="www.subdominio1.com.ar">Subdominio1</a></li>
                  <li><a href="www.subdominio2.com.ar">Subdominio1</a></li>
                  <li><a href="www.subdominio3.com.ar">Subdominio1</a></li>
                </ul>
              </nav>
            </div>
          <?php echo $weatherWidget ?>

        </div>
      </div>


        <div id="content-mobile" class="site-navbar bg-dark">
            <div class="container py-1">
              <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">

                  <a class="navbar-brand" href="#">
                    <img src="images/logo.png" alt="Logo" style="width:50px">
                  </a>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                  <nav class="site-navigation text-right text-md-right navbar-fixed-top" role="navigation">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>

      </nav>
  </nav>




  <script>
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
  </script>
