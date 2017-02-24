<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home extends MX_Controller{
	public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        // $this->load->model('Mhomepage');
        
    }

    public function index() {
        $data = array(
        	'judul_halaman' => 'Selamat Datang di NEON',
        	);

         $data['files'] = array( 

            APPPATH.'modules/home/views/v-index.php',

            // APPPATH.'modules/modulonline/views/v-edudrive.php',

            // // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            // APPPATH.'modules/testimoni/views/v-footer.php',

        );

        $this->parser->parse('templating/index', $data );
    }
}

?>