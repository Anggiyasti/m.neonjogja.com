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

         <!-- Profile Content -->
        <div class=" delay-1">
          <div class="card  delay-2">
            <h5 class="uppercase">Email</h5>
            <?php echo $this->session->flashdata('updsiswa'); ?>
            <form class="col s12" name="form-account" action="<?=base_url()?>index.php/siswa/ubahemailsiswa" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email" value="" required="true">
                <label for="email" class="active">Email baru..</label>
                <span class="text-danger"> <?php echo form_error('email'); ?></span>
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
        