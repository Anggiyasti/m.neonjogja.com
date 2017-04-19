<!-- Page Content -->
      <div id="content" class="page" style="min-height: 320px">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Video Pembelajaran</span>
        </div>

        <!-- Main Content -->
        <div class="p-20 animated fadeinup">
          <h4 class="uppercase">{nama_sub}</h4>
          <p>{nama_penulis}</p>
          <div class="video-container m-b-20">
            <iframe width="760" height="430" src="{file}" frameborder="0" allowfullscreen></iframe>
          </div>
                
        </div>
        <!-- End of Main Contents -->

        <!-- Comments -->
          <div class="comments">
            <h3 class="uppercase"><?=count($comments) ?> Komentar</h3>
            <ul class="comments-list">

              

              <li class="your-comment">
                <form action ="" id="formkomen" method = "post">
                <div id="info">
                    <div class="sukses text-info text-center hide">
                        <span>Komen anda telah terkirim, tunggu moderisasi dari guru yang bersangkutan</span>
                    </div>
                    <div class="gagal text-danger text-center hide">
                        <span>Gagal memberikan komen !</span>
                    </div> 
                    <div class="lengkapi text-danger text-center hide">
                        <span>Tolong isi komentar</span>
                    </div>
                </div>
                <img src="http://placehold.it/70x70" alt="" class="avatar circle">
                <label for="textarea1">You</label>
                <textarea id="isiKomen" name="isiKomen" class="materialize-textarea" placeholder="Tambahkan komentar"></textarea>
                <button class="btn accent-color waves-effect waves-light right" type="submit">Kirim</button>
                </form>
              </li>
              <?php foreach ($comments as $comment): ?>
              <li style="margin-top: 70px;">
                <img src="http://placehold.it/70x70" data-at2x="http://placehold.it/70x70" alt="" class="avatar circle">
                <div class="comment-body">
                  <span class="author uppercase"><?=$comment->namaPengguna ?></span>
                  <span class="date"><time datetime="<?=$comment->date_created ?>"> <?=$comment->date_created ?></time></span>
                  <p> <?=$comment->isiKomen ?></p>
                </div>
              </li>
              <?php endforeach ?>
            </ul>
            <hr>
            <div class="justify">
              <h5>{nama_sub} <i class="ion-ios-list-outline"></i></h5>
                <!-- <ul > -->
                    <?php foreach ($videobysub as $videobysub_item): ?>
                      <div style="color: #1e88e5; padding: 0.2em;">
                        <a href="<?= base_url('index.php/video/seevideo/') ?><?= $videobysub_item->id ?>#ini"><?= $videobysub_item->judulVideo ?></a>
                      </div>
                    <?php endforeach ?>
                <!-- </ul> -->
            </div>
            
          </div>      
        

        
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->



    <script src="http://macyjs.com/assets/js/macy.min.js"></script>

<script>
    $(document).ready(function () {
        Macy.init({
          container: '#macy-container',
          trueOrder: false,
          waitForImages: false,
          margin: 24,
          columns: 3,
          breakAt: {
            1200: 5,
            940: 3,
            520: 2,
            400: 1
        }
    });

        $("#formkomen").submit(function (e) {
            e.preventDefault();
            var isiKomen = $("#isiKomen").val();
            var videoID = <?= $this->uri->segment(3) ?>;
            if (isiKomen=="") {
                $('#info .lengkapi').removeClass('hide');
                $('#info .sukses').addClass('hide');
                $('#info .gagal').addClass('hide');
            }else{
             $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>index.php/video/addkomen',
                data: {isiKomen: isiKomen, videoID: videoID},
                success: function (data)
                {
                    swal({   title: "Komen Berhasil ditambahkan",   
                     type: "info",   
                     showCancelButton: false,   
                     confirmButtonColor: "#8BDCF7",   
                     confirmButtonText: "Ok!",   
                     closeOnConfirm: false }, 
                     function(){   
                        window.location = base_url+"video/seevideo/"+videoID;
                        ; });
                },
                error: function ()
                {
                    $('#info .lengkapi').removeClass('hide');
                    $('#info .sukses').addClass('hide');
                    $('#info .gagal').removeClass('hide');
                }
            }); 
         }

     });
    });
</script>