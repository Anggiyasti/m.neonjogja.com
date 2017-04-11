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

          <h1>Login</h1>
          <?php if ($this->session->flashdata('notif') != '') {

                    ?>

                    <div class="alert alert-warning">

                        <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>

                    </div>

                <?php } else { ?>

                    <div class="alert alert-warning">

                        Siap berpetualang? Isi form, tekan Login!

                    </div>

                <?php }; ?>
          <?php echo form_open('login/validasiLogin'); ?>
          <?php echo validation_errors(); ?>
          <div class="input-field">
            <i class="ion-android-contact prefix"></i> 
            <input type="text" name="username" value="<?php echo set_value('email') ?>" onfocus="if (this.value=='Username/Email') this.value = ''" onblur="if (this.value=='')" class="validate"/>
            <label for="login">Email address *</label>
          </div>

          <div class="input-field" style="margin-bottom:20px;">
            <i class="ion-android-lock prefix"></i> 
            <input type="password" name="password" onfocus="if (this.value=='password') this.value = ''" onblur="if (this.value=='') " class="validate"/>
            <label for="login-psw">Password *</label>
          </div>

          
          <button class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4" type="submit" value="Login">Login</button>
          <span>Belum punya akun? <a href="<?php echo base_url('index.php/registrasi')?>" class="primary-text">Buat akun |</a> <a href="<?php echo base_url('index.php/register/lupapassword')?>" class="primary-text">Lupa Password </a> 
          <?php echo form_close(); ?>
        </div><!-- End of Main Contents -->
      </div>
      
       
   