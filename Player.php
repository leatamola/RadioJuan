<div id="elegiElCanal" class="d-flex justify-content-end">
    <span>ELEGÍ EL CANAL</span>
</div>
<div id="controlVolumen" class="d-flex justify-content-start">
  <div id="volumenMostrar" class="col-12">
      <div class="row volume-control align-items-center">
          <div class="volume-icon col-1"><i class="fa fa-volume-up"></i></div>
          <div style="left: -70px;" class="volume-slide col-8 justify-content-start"><input type="range" id="volume"
                  step="1" min="0" max="100" value="80"></div>
          <div style="color:#13171d" class="percentual-volume col-2">Volume <span id="volIndicator">...</span>%</div>
      </div>
  </div>
</div>

<section id="">
  <div class="container-fluid bg-dark transparent fixed-bottom">
    <div id="playerMobileCenter" class="row web-player d-flex align-items-center">
        <div class="">
            <div class="cover-album" style="height: 95px;">
                <div id="currentCoverArt" style="background-image: url(&quot;img/bg-capa.jpg&quot;);" class="animated bounceInLeft"></div>
                <!-- <div class="watermark"></div> -->
            </div>
        </div>
        <div class="play-padding">
            <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="play-pause col-xs-2 col-md-4">
                          <i id="playerButton" class="fa fa-play" onclick="togglePlay()"></i>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="" style="padding-top: 10px;">
          <div class="info-current-song text-left">
            <h2 id="currentSong" class="animated flipInY text-uppercase"><?php echo $siteTitle ?></h2>
            <h3 id="currentArtist" class="animated flipInY text-capitalize"></h3>
          </div>
        </div>
      </div>
    </div>
</section>
