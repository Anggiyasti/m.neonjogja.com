 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <!-- Page Content -->
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

        <!-- Article Content -->
        <div class=" delay-1">
          <div class="card  delay-2">

          <!-- START Row -->
              <div class="row">
                <!-- Pencarian -->
               <aside class="widget-search">
                  <form method="get" class="search-form" action="<?=base_url()?>index.php/linetopik/cariTopik"  accept-charset="utf-8" enctype="multipart/form-data">
                  <div>
                      <label>
                          <span class="screen-reader-text">Search for:</span>
                          <input type="search" class="ui-autocomplete-input" placeholder="Search"  name="keycari" title="Search for:" id="caritopik">
                      </label>
                      <input type="submit" class="search-submit" value="GO">
                  </div>
                  </form>
                </aside>
                <!-- /Pencarian -->
              </div>
              <!-- END ROW -->


          <div class="p-t-20">
          <ul class="tabs">
            <li class="tab"><a class="active" >Topik </a></li>
          </ul>
          </div>
            <!-- <div id=""> -->
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
              <!-- Start Time Line -->
              <?php 
              $i=0;
             foreach ($topik as $rows): ?>
                <div class="contact">
                 
                  <div class="dot z-depth-1" id="bulet-<?=$i;?>">
                  </div>
                  <div class="step">
                  <p>
                    <a href="<?=base_url('index.php')?>/linetopik/learn/<?=$rows['id']?>" class="media-heading"  id="font-<?=$i;?>" ><?=$rows['namaTopik']?></a>
                  </p>

                  </div>
                </div>
              <?php 
              $i ++;
              endforeach ?>
            
              <!-- END Tieme line -->


              <?php if ($datline!= array()): ?>
                <div class="tags-post">
                </div>
              <?php else: ?>
                <div class="container-404">
                  <div class="number">U<span>P</span>S</div>
                  <p><span>Maaf:(</span><br>Step Line Belum Tersedia.</p>               
                </div>
              <?php endif ?>

              </div>
            </div>
          </div>

            
          </div>
        </div> 

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
                 $("#bulet-"+i).css("border-color","black");
            } 
           
        }
    });
</script>
