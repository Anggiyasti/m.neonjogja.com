 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Learning Line</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title">{judul_header}</div>
          </div>

        <!-- Article Content -->
        <div class=" delay-1">
          <div class="card  delay-2">
          <div class="p-t-20">
          <ul class="tabs">
            <li class="tab"><a class="active" >Materi </a></li>
          </ul>
          </div>
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
              <!-- END Tieme line -->

              </div>
            </div>
          </div>
           <div id="test">
            <div class="p-t-20" >
              <article>
                            <div class="post-info" >
                                <!-- <div class="date-post"><div class="day"><?=$tgl?></div><div class="month"><?=$bulan?></div></div> -->
                                <div class="post-info-main">
                                    <div class="author-post">Nama Materi:' <?= $datMateri['judulMateri']; ?> '</div>
                                </div>
                                <div class="comments-post">
                                  <h1>Materi : </h1>
                                </div>
                            </div>
                             <p><?= $datMateri['isiMateri']; ?></p>
                                
                            </article>
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
                 $("#bullet-"+i).css("border-color","black");
            } 
           
        }
    });
</script>
