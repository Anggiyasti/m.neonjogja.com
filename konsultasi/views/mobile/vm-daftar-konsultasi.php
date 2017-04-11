       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Konsultasi</span>
        </div>

        <!-- Hero Header -->
         <div class="h-banner-costume animated fadeindown">
          <div class="parallax primary-color">
            <div class="floating-button animated bouncein delay-3">
              <div class="" style="margin:1rem 2rem;">
                <div class="col s12"><input type="text" id="tags" class="white" placeholder=" Cari Pertanyaan..."></div>
              </div>
            </div>
          </div>
         </div>

        

        <!-- Modal Structure Bottom Sheet -->
        <select class="col s12 browser-default" id="filter-pertanyaan">
          <option value="" disabled selected class="col s12">Pilih Pertanyaan</option>
          <option value="all" >Semua Pertanyaan</option>
          <option value="tingkat" >Pertanyaan Setingkat</option>
        </select>

        <div id="modal4" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="alert alert-dismissable alert-danger" id="info" hidden="true" >
              <button type="button" class="close" onclick="hideme()" >×</button>
              <strong>Terjadi Kesalahan</strong> <br>Silahkan Lengkapi Data.
             </div><br>
            <h4>Pilih Bab Yang Akan Kamu Tanyakan</h4><br>
            <p>
              <form id="formlatihan" method="post" onsubmit="return false;">
              <br>
                <div class="raw">
                  <div class="input-field col s12 has-success">
                    <select name="mapel" id="mapelSelect">
                      <option value="0" disabled selected>- Pilih Matapelajaran -</option>
                      <?php foreach ($mapel as $mapel_item): ?>
                      <option value="<?=$mapel_item['tingpelID'] ?>"><?=$mapel_item['napel'] ?></option>
                    <?php endforeach ?>
                    </select>
                    <label>Matapelajaran</label>
                  </div>
                </div>
                <br>
                <div class="raw">
                  <div class="input-field col s12 has-success">
                    <select>
                      <option value="0" disabled selected>- Pilih Bab -</option>
                    </select>
                    <label>Bab</label>
                  </div>
                </div>
                <br>
                <div class="raw">
                  <div class="input-field col s12 has-success">
                    <select>
                      <option value="0" disabled selected>- Pilih Sub Bab -</option>
                    </select>
                    <label>Sub Bab</label>
                  </div>
                </div>                
              </form>
              
            </p>
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-accent btn-flat buat-btn">Buat</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-accent btn-flat">Batal</a>
          </div>
        </div>

        <!-- Main Content -->
        <div class="animated fadeinup white" >
          <div class="activities" id="semua-pertanyaan">
            <?php foreach ($questions as $question): ?>
            <div class="activity animated fadeinright delay-1" style="border-bottom: 1px solid #e53935">
              <p class="title-konsultasi space-konsultasi"><a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>"><?=$question['judulPertanyaan'] ?></a></p>
              <div class="space-konsultasi"><span class="label label-danger"><a href="#"><?=$question['judulSubBab'] ?></a></span></div>
              <span class="text-small text-light space-konsultasi"><?=$question['date_created'] ?> | <span style="color: #07C;"><?=$question['namaDepan']." ".$question['namaBelakang'] ?></span></span><br>
              <span class="text-small text-light"><a href="#"><?=$question['jumlah'] ?> comments</a></span>
            </div>
            <?php endforeach ?>
            <div aria-label="Page navigation" class="animated delay-1 activity">
              <ul class="pagination">
                <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </div>
            </div>
            
           
         <!-- pertanyaan Tingkat -->
         <div class="activities" id="pertanyaan-setingkat" >
            <?php foreach ($questions_bylevel as $question): ?>
            <div class="activity animated fadeinright delay-1" style="border-bottom: 1px solid #e53935">
              <p class="title-konsultasi space-konsultasi"><a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>"><?=$question['judulPertanyaan'] ?></a></p>
              <div class="space-konsultasi"><span class="label label-danger"><a href="#"><?=$question['judulSubBab'] ?></a></span></div>
              <span class="text-small text-light space-konsultasi"><?=$question['date_created'] ?> | <span style="color: #07C;"><?=$question['namaDepan']." ".$question['namaBelakang'] ?></span></span><br>
              <span class="text-small text-light"><a href="#"><?=$question['jumlah'] ?> comments</a></span>
            </div>
            <?php endforeach ?>
            <div aria-label="Page navigation" class="animated delay-1 activity">
              <ul class="pagination">
                <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </div>
            </div>
         <!-- end -->
          

          <!-- Floating Action Button -->
        <div class="floating-button page-fab animated bouncein delay-3">
          <a class="btn-floating btn-large waves-effect waves-light accent-color btn z-depth-1 modal-trigger" href="#modal4">
            <i class="ion-android-add"></i>
          </a>
        </div>
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->