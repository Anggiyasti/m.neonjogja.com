<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Register extends MX_Controller{
	public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->library('sessionchecker');
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->library('session');

        if ($this->session->userdata('loggedin')==true) {
            if ($this->session->userdata('HAKAKSES')=='siswa'){
               // redirect('welcome');
            }else if($this->session->userdata('HAKAKSES')=='guru'){
               redirect('guru/dashboard');
           }else{
           }

       }
        
    }

    public function index() {
        $data = array(
        	 'judul_halaman' => 'Registrasi - Neon',
        	);

         $data['files'] = array( 

            APPPATH.'modules/register/views/v-register.php',

            // APPPATH.'modules/modulonline/views/v-edudrive.php',

            // // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            // APPPATH.'modules/testimoni/views/v-footer.php',

        );

        $this->parser->parse('templating/index', $data );
    }
}

?>