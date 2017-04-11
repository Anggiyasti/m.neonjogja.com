       <?php 

        foreach ($sis as $row) {

            $namaDepan = $row['namaDepan'];

            $namaBelakang = $row['namaBelakang'];

            $alamat = $row['alamat'];

            $noKontak = $row['noKontak'];

            $biografi = $row['biografi'];

            $namaSekolah = $row['namaSekolah'];

            $alamatSekolah  = $row['alamatSekolah']; 

            $photo=base_url().'assets/image/photo/siswa/'.$row['photo'];

            $oldphoto=$row['photo'];

        } ;

     ?>  
       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Profil Siswa</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title"><?=$namaDepan;?> <?=$namaBelakang;?></div>
          </div>
         </div>



         <!-- Profile Content -->
        <div class=" delay-1">
          <div class="card  delay-2">
          <?php if ($this->session->flashdata('updsiswa') != '') {

                                ?>

                                <div class="alert alert-warning fade in">

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <span class="semibold">Note :</span><?php echo $this->session->flashdata('updsiswa'); ?>

                                </div>

                            <?php } else { ?>

                                <div class="alert alert-warning fade in">

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <span class="semibold">Note :</span>&nbsp;&nbsp;Pastikan data form di isi dengan benar.

                                </div>

                            <?php }; ?>
            <h5 class="uppercase">Profile</h5>
            <form class="col s12" name="form-profile" action="<?=base_url()?>index.php/siswa/ubahprofilesiswa" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s6">
                  <input placeholder="Placeholder" name="namadepan" value="<?=$namaDepan;?>" type="text" class="validate">
                  <label for="first_name" class="active">Nama Depan</label>
                  <span class="text-danger"> <?php echo form_error('namadepan'); ?></span>
                </div>
                <div class="input-field col s6">
                  <input  type="text" class="validate" name="namabelakang" value="<?=$namaBelakang;?>">
                  <label for="last_name" class="active">Nama Belakang</label>
                </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="alamat" value="<?=$alamat; ?>">
                <label class="active">Alamat</label>
                <span class="text-danger"> <?php echo form_error('namadepan'); ?></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input  type="text" class="validate" name="nokontak" value="<?=$noKontak;?>">
                <label class="active">No Kontak</label>
                <span class="text-danger"> <?php echo form_error('nokontak'); ?></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name="biografi" placeholder="About yourself in 160 characters or less"><?=$biografi;?></textarea>
                <label for="textarea1" class="active">Bio</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input  type="text" class="validate"  name="namasekolah" value="<?=$namaSekolah;?>">
                <label class="active">Nama Sekolah</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input  type="text" class="validate"  name="alamatsekolah" value="<?=$alamatSekolah;?>">
                <label class="active">Alamat Sekolah</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
              <button type="reset" class="col s12 btn accent-color waves-effect waves-light right" style="margin-bottom: 10px;">Reset</button>
              <button type="submit" class="col s12 btn accent-color waves-effect waves-light right">Simpan Perubahan</button>
              </div>
            </div>

            </form>
          </div>
                      
        </div>
        
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->