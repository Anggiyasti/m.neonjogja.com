<?php



defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );



class Welcome extends MX_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model( 'matapelajaran/mmatapelajaran' );
        $this->load->model( 'video/mvideos' );
        $this->load->model( 'tingkat/MTingkat' );
        $this->load->model( 'siswa/msiswa' );
        $this->load->library('sessionchecker');
        $this->load->library("pagination");
        $config['permitted_uri_chars'] = 'a-z 0-9~%.:&_\-'; 



        $this->load->library( 'parser' );

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

            'judul_halaman' => 'Neon - Welcome',

            'judul_header' =>'Welcome',

            'judul_header2' =>'Video Belajar'



        );


        if ($this->session->userdata('NAMASISWA')) {
          

        $data['files'] = array( 

            // APPPATH.'modules/homepage/views/v-header-login.php',
            APPPATH.'modules/templating/views/layouts/v-sidebar.php',
            APPPATH.'modules/welcome/views/vm-welcome.php',
            APPPATH.'modules/templating/views/layouts/v-footer.php',


            // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            // APPPATH.'modules/testimoni/views/v-footer.php',

        );


            }
            else{
                redirect('login');
            }
            // $config = array();
            // $config["base_url"] = base_url() . "welcome/index/";
            // $config["uri_segment"] = 3;
            // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            // $config["total_rows"] = $this->msiswa->persentasi_limit_number(10);
            // $config["per_page"] = 5;

            // # konfig link
            // $config['cur_tag_open'] = "<a style='background:#800000;color:white'>";
            // $config['cur_tag_close'] = '</a>';
            // $config['first_link'] = "<span title='Page Awal'> << </span>"; 
            // $config['last_link'] = "<span title='Page Akhir'> >> </span>";

            # konfig link

            // $this->pagination->initialize($config);
            ##KONFIGURASI UNTUUK PAGINATION


        $data['tingkat'] = $this->load->MTingkat->gettingkat();
        // print_r($data['tingkat']);
        $penggunaID = $this->session->userdata['id'];
        $data['siswa'] = $this->load->msiswa->get_siswapoto($penggunaID);
        $data['topik'] = $this->msiswa->persentasi_limit(3);
        $data['latihan'] = $this->msiswa->get_limit_persentase_latihan(3);
        $data['video'] = $this->mvideos->get_video_limit();
        $data['learning'] = $this->msiswa->persentasi_limit(10);

        $data['latihan'] = $this->msiswa->get_limit_persentase_latihan(10);
       
        // var_dump($data['learning']);
        $this->parser->parse( 'templating/index', $data );
         // var_dump($data );


    }


    public function faq()
    {

         $data = array(

            'judul_halaman' => 'Neon - FAQ',

            'judul_header' =>'FAQ HASIL DETECTION',

            'judul_header2' =>'Video Belajar'



        );

        $data['files'] = array( 

            APPPATH.'modules/homepage/views/v-header-login.php',

            APPPATH.'modules/welcome/views/v-faq.php',

            // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            APPPATH.'modules/testimoni/views/v-footer.php',

        );
        $this->parser->parse( 'templating/index', $data );
    }


## get data latihan persentase buat di datatable.
public function get_data_latihan(){
    $list = $this->msiswa->get_limit_persentase_latihan(10);
    $data = array();
    $n=1;
        //mengambil nilai list
    $baseurl = base_url();
    foreach ( $list as $item ) {
        $row = array();

        $row[] = $n;
        $row[] = $item['judulBab'];
        $row[] = $item['total_soal'];
        $row[] = $item['total_benar'];
        $row[] = $item['total_salah'];
        $row[] = $item['total_kosong'];
        $row[] = (int)$item['total_benar'] / (int)$item['total_soal'] * 100;
        $persentasi = (int)$item['total_benar'] / (int)$item['total_soal'] * 100;   
        $row[] = "<span class='skill-bar' title=".$persentasi."> <span class='bar'><span class='bg-color-4 skill-bar-progress' processed='true' style='width: ".$persentasi."%;'></span></span></span>";
        $persentasi;





        $data[] = $row;
        $n++;

    }

    $output = array(
        "data"=>$data,
        );
    echo json_encode( $output );

}
## learning line persentase datatable.
public function get_data_learning_line(){
    $list = $this->msiswa->persentasi_limit(10);
    $data = array();
    $n=1;
        //mengambil nilai list
    $baseurl = base_url();
    foreach ( $list as $item ) {
        $row = array();

        $row[] = $n;
        $row[] = $item['namaTopik'];
        $row[] = $item['stepDone'];
        $row[] = $item['jumlah_step'];
        $persentasi = (int)$item['stepDone'] / (int)$item['jumlah_step'] * 100;   
        $row[] = (int)$persentasi;
        $title = (int)$persentasi."%"; 
        $row[] = "<span class='skill-bar' title=".$title."> <span class='bar'><span class='bg-color-4 skill-bar-progress' processed='true' style='width: ".$persentasi."%;'></span></span></span>";


        $data[] = $row;
        $n++;

    }

    $output = array(
        "data"=>$data,
        );
    echo json_encode( $output );




}



}

