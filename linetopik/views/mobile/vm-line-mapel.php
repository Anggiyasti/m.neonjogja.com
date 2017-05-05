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
          <?php if ($datMapel==array()): ?>
              <h4 class="text-center" style="color:#f27c66;">Maaf,Pada Tingkat ini belum tersedia learning line!</h4>
          <?php else : ?>
          <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
          <?php  
                $n=0;
                $oldMpalel='';
          ?>
          <?php foreach ($datMapel as $key): ?>
            <?php $mapel=$key['mapel'] ?>
            <?php if ($n==0): ?>
              <?php $n=1; ?>
            <!-- Header Info -->
            <li>
              <div class="collapsible-header"><?=$mapel?></div>
              <div class="collapsible-body"></div>

            <!-- /Header Info -->
            <?php $ke=1; ?>
            <?php elseif($oldMpalel != $mapel) : ?>
            <!-- Footer info -->
            </li>
            <!-- Footer Info -->
            <!-- Header Info -->            
            <li>
              <div class="collapsible-header"><i class="ion-android-cloud"></i><?=$mapel?></div>
               <!-- /Header Info -->
              <?php endif ?>
              <!-- Body Info -->
              <div class="collapsible-body">
                <!-- <h6><a href="<?=base_url('index.php')?>/linetopik/learningline/<?=$key['babID']?>"><?=$key['judulBab']?></a></h6> -->
                <div class="container activity p-l-r-20">
                  <div class="row m-l-0">
                    <div class="col">
                      <div class="contact">
                      <span class="date"><a href="<?=base_url('index.php')?>/linetopik/learningline/<?=$key['babID']?>"><?=$key['judulBab']?></a></span>
                      <div class="dot z-depth-1">
                      </div>
        
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Body info -->
              <?php $oldMpalel=$mapel; ?>
             <?php endforeach ?>
              <!-- Footer info -->

            </li>
             <!-- Footer Info -->
            </ul>
            <?php endif ?>

            
          </div>
        </div> 
