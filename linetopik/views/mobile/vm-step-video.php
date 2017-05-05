<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
<!-- Automplate -->
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<!-- /Automplate -->

<!-- START Blog Content -->


   <div id="content" class="page">
      <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">{judul_header}</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title">{judul_header2}</div>
          </div>

          <div class=" delay-1">
            <div class="card  delay-2">
              <!-- START Row -->
              <div class="row">
                <!-- Pencarian -->
               <aside class="widget-search">
                  <form method="get" class="search-form" action="<?=base_url()?>index.php/linetopik/cariTopik"  accept-charset="utf-8" enctype="multipart/form-data">
                      <label>
                          <span class="screen-reader-text">Search for:</span>
                          <input type="search" class="ui-autocomplete-input" placeholder="Search"  name="keycari" title="Search for:" id="caritopik">
                      </label>
                      <input type="submit" class="search-submit" value="GO">
                  </form>
                </aside>
                <!-- /Pencarian -->
              </div>
              <!-- END ROW -->
            </div>
          </div>

          <div class=" delay-1">
            <div class="card  delay-2">
              <!-- START ROW -->
              <div class="row">
                <h2><a href="<?=base_url('index.php/linetopik/timeLine/').$topikUUID?>"><?=$namaTopik; ?></a></h2> 
                <div class="container activity p-l-r-20">
                  <div class="row m-l-0">
                    <div class="col">
                      <!-- Start Time Line -->
                      <?php 
                      $i=0;
                      foreach ($datline as $key ): ?>
                        <div class="contact">
                          <div class="dot z-depth-1" id="bullet-<?=$i;?>">
                          </div>
                          <p>
                            <a href="<?=$key['link'];?>#test" class="media-heading"  id="font-<?=$i;?>" ><?=$key['namaStep']?></a>
                          </p>
                          <!-- Untuk menampung staus step disable or enable -->
                          <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                        </div>
                      <?php 
                      $i ++;
                      endforeach ?>
                      <!-- menampung nilai panjang array -->
                      <input id="n" type="text"  value="<?=$i;?>" hidden="true">
                      <!-- END Tieme line  -->
                    </div>
                  </div>
                </div>
              </div>
            <!-- END ROW -->
            </div>
          </div>

          <div class=" delay-1" id="test">
            <div class="card  delay-2">
              <!-- START ROW -->
              <div class="row">
              <h3>Judul Video : <?=$datVideo['judulVideo']?></h3>
                <?php if ($datVideo['link']=='' || $datVideo['link']==' '): ?>
                  <div class="container-video color-palette bg-color-6alt">
                    <video class="" width="100%" height="100%"  controls>
                      <source src="<?=base_url();?>assets/video/<?=$datVideo['namaFile'];?>" >
                        Your browser does not support the video tag.
                    </video>
                  </div>
                <?php endif ?>
                <?php if ($datVideo['namaFile']=='' || $datVideo['namaFile']==' '): ?>
                <div class="video-player" style="background:grey;">
                  <iframe src="<?=$datVideo['link']?>" width="100%" height="300" frameborder="0" allowfullscreen></iframe> 
                </div>
                <?php endif ?>
                <h3>Deskripsi</h3>
                <p><?=$datVideo['deskripsiVideo']?></p>
              </div>
              <!-- END ROW -->
            </div>
          </div>




<!--/ END Blog Content -->
<script type="text/javascript">
    $(document).ready(function() { 
        var n = $("#n").val();
        console.log(n);
        $("#ico-0").css("background","red");
        for (i = 0; i < n; i++) {
        var status = $("#status-"+i).val();
        
            if (status=="disable") {
                 $("#ico-"+i).css("background","red");
                 $("#font-"+i).css("color","black");
                 $("#bullet-"+i).css("border-color","black");
            } 
           
        }
    });
</script>

