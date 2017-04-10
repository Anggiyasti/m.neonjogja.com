 <!-- Page Content -->
      <div id="content" class="grey-blue login">

        <!-- Toolbar -->
        <div id="toolbar" class="tool-login primary-color animated fadeindown">
          <a href="javascript:history.back()" class="open-left">
            <i class="ion-android-arrow-back"></i>
          </a>
        </div>
        
        <!-- Main Content -->
        <div class="login-form animated fadeinup delay-2 z-depth-1">

          <h1>Lupa Password</h1>

                    <?php if ($this->session->flashdata('notif') != '') {

                        ?>

                        <div class="alert alert-warning">

                            <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>

                        </div>

                    <?php } else { ?>

                        <div class="alert alert-warning">

                            <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.

                        </div>

                    <?php }; ?>
                    <hr>

          <form name="form-register" action="<?= base_url() ?>index.php/register/ch_sent_reset" method="post">
             <div class="form-group">
                <div class="input-field" style="margin-bottom:20px;">
                    <i class="ion-android-mail prefix"></i> 
                    <input type="email" class="form-control" name="email" required>
                    <label for="login-email">Email</label>
                </div>
            </div>

            <button type="submit" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4"><span class="semibold">Submit</span></button>
             <span>Belum punya akun? <a href="<?php echo base_url('index.php/registrasi')?>" class="primary-text">Buat akun</a> 
          </form>
<!-- 
          <a class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4" href="index.html">Send</a> 
          <span>Don't have an account? <a class="primary-text" href="signup.html">Sign Up</a></span> -->
        </div><!-- End of Main Contents -->
      
       
      </div> <!-- End of Page Content -->
