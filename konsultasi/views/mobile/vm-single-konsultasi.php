
       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Konsultasi</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-ios-search"></i>
          </div>
        </div>
        
        <!-- Main Content -->
  <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="myModal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="modal-header">Balas</h4>
      <p>
        <div class="row">
          <div class="input-field col s12" id="modal-body">
            
          </div>
        </div>
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="post-koment">Post</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Batal</a> 
    </div>
  </div>

   <!-- Modal Structure -->
  <div id="modalJawab" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="header-jawab-pertanyaan">Balas Pertanyaan</h4>
      <div class='col s12 quotes kuote' ><p ><i style="font-size: 12px"></i></p></div>
      <p>
        <div class="row">
          <div class="input-field col s12">
            <textarea name='editor1' id="komenText" class="materialize-textarea"></textarea>
            <label for="komen">Komentar</label>
          </div>
        </div>
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="post-balas">Post</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="batal">Batal</a>
    </div>
  </div>

        <div class="animated fadeinup white">
         <div class="activities">
            <div class="activity animated fadeinright delay-1">
              <a href="#" class="title-konsultasi">{judul_header}</a><br>
              <span class="label label-danger"><a href="#">{sub}</a></span>
              <div>
                
                <div class="isi-posting">
                  <?=$isi ?>
                  <input type="hidden" name="single" value="<?=$isi ?>">
                </div>
                <div style="border-top: 1px solid #ddd; color: black; min-height: 50px; padding: 5px; margin-bottom: 4px;">
                  <div class="left" >
                    <div class="row">
                      <div class="col s12">
                        <div class="col s4">
                          <img src="http://placehold.it/60x60" alt="" class="circle img-konsultasi">
                        </div>
                        <div class="col s8">
                          <span>{author}</span> <br> <span style="color: #B2B2B4;">{akses}</span>
                            <input type="hidden" value="{id_pertanyaan}" name="idpertanyaan">
                            <input type="hidden" value="{id_pengguna}" name="idpengguna">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="right">
                    <span>{tanggal} {bulan}</span><br>
                    <a href="#" data-quote="single" rel="tag" style="color: #07C;" class="quote">Quotes</a> | <a href="#" data-quote="0" rel="tag" style="color: #07C;" class="quote">Balas</a>
                  </div>
                </div>
              </div>
              <div style="padding: 5px 5px; background-color: #ff8489; color: white;">{jumlah} comments</div>
              <div>
              <?php if ($data_postingan!=array()): ?>
                <?php foreach ($data_postingan as $item_postingan): ?>
                <div class="isi-posting"><?=$item_postingan['isiJawaban'] ?></div>
                <div style="border-top: 1px solid #ddd; color: black; min-height: 60px; padding:0.5rem 0; border-bottom: 1px solid #ff8489;">
                  <div class="left">
                    <div class="row">
                      <div class="col s12">
                        <div class="col s4">
                          <?php $gbr = base_url().'assets/image/photo'."/".$item_postingan['hakAkses']."/".$item_postingan['avatar'] ?>
                          <img src="<?= (!$item_postingan['avatar'])? base_url('assetsnew/img/profile/avatarmen.png') :  $gbr ; ?>" class="circle img-konsultasi">
                        </div>
                        <div class="col s8">
                          <span><?=$item_postingan['namaPengguna'] ?></span><br>
                          <span style="color: #B2B2B4;"><?=$item_postingan['hakAkses'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php if ($this->session->userdata('HAKAKSES')=="guru"): ?>
                  <div class="right">
                    <span><?= date("d-M-Y", strtotime($item_postingan['date_created'])) ?></span><br>
                    <a href="#" data-quote="<?=$item_postingan['jawabID'] ?>" style="color: #07C;" class="quote">Quote</a>
                  </div>
                  <?php else :?>
                    <?php if ($item_postingan['namaPengguna']==$this->session->userdata('USERNAME')): ?>
                      <div class="right">
                        <span><?= date("d-M-Y", strtotime($item_postingan['date_created'])) ?></span><br>
                        <a href="#" data-quote="<?=$item_postingan['jawabID'] ?>" style="color: #07C;" class="quote">Quote</a>
                      </div>
                    <?php else :?>
                      <div class="right">
                        <span><?= date("d-M-Y", strtotime($item_postingan['date_created'])) ?></span><br>
                        <a href="#" data-point="<?=$item_postingan['jawabID'] ?>" style="color: #07C;" class="point">Point</a> | <a href="#" data-quote="<?=$item_postingan['jawabID'] ?>" style="color: #07C;" class="quote">Quote</a>
                      </div>
                    <?php endif ?>
                  <?php endif ?>
                </div>
                <?php endforeach ?>
              <?php endif ?>
              </div>
              </div>
            </div>
          </div> 


        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->
