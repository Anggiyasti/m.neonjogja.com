<?php



defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );



class Welcome extends MX_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model( 'matapelajaran/mmatapelajaran' );
        $this->load->model( 'video/mvideos' );
        $this->load->model( 'tingkat/MTingkat' );
        $this->load->model( 'siswa/msiswa' );
        $this->load->model( 'ortu/mOrtu' );
        $this->load->model('tryout/mtryout');
        $this->load->library('sessionchecker');
        $this->sessionchecker->checkloggedin();
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

        
          

        $data['files'] = array( 

            // APPPATH.'modules/homepage/views/v-header-login.php',
            APPPATH.'modules/templating/views/anggi/v-sidebar.php',
            APPPATH.'modules/welcome/views/vm-welcome.php',
            APPPATH.'modules/templating/views/anggi/v-footer.php',


            // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            // APPPATH.'modules/testimoni/views/v-footer.php',

        );           
        if ($this->session->userdata('HAKAKSES')=='ortu') {
        $id_pengguna= $this->session->userdata['id'];
        $namaDepan=$this->mOrtu->get_siswa($id_pengguna)[0]['namaDepan'];
        $namaBelakang=$this->mOrtu->get_siswa($id_pengguna)[0]['namaBelakang'];
        $data['sis'] =$namaDepan.' '. $namaBelakang ;
        // var_dump($data['siswa']);
        
    }

        $data['tingkat'] = $this->load->MTingkat->gettingkat();
        // print_r($data['tingkat']);
        $penggunaID = $this->session->userdata['id'];
        $data['siswa'] = $this->load->msiswa->get_siswapoto($penggunaID);
        $data['topik'] = $this->msiswa->persentasi_limit(3);
        $data['latihan'] = $this->msiswa->get_limit_persentase_latihan(3);
        $data['video'] = $this->mvideos->get_video_limit();
        $data['learning'] = $this->msiswa->persentasi_limit(10);

        $data['lat'] = $this->msiswa->get_limit_persentase_latihan(10);
        $data['tryout']= $this->mtryout->get_report_paket();
        $data['pesan'] = $this->msiswa->get_pesan();
        $this->parser->parse( 'templating/anggi/index', $data );
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

function ajax_report_tryout($id=""){
    $datas = $this->mtryout->get_report_paket($id);
    // var_dump($datas);

    $list = array();
    $no = 0;
        //mengambil nilai list
    $baseurl = base_url();
    foreach ($datas as $list_item) {
        $no++;
        $row = array();
        $sumBenar=$list_item ['jmlh_benar'];
        $sumSalah=$list_item ['jmlh_salah'];
        $sumKosong=$list_item ['jmlh_kosong'];
            //hitung jumlah soal
        $jumlahSoal=$sumBenar+$sumSalah+$sumKosong;

        $nilai=0;
            // cek jika pembagi 0
        if ($jumlahSoal != 0) {
                //hitung nilai
            $nilai=$sumBenar/$jumlahSoal*100;
        }
        $row[] = $no;
        //kondisi jika orang tua yang login maka akan ditampikan nama tryout
        $row[] = $list_item['nm_tryout'];
       
        $row[] = $jumlahSoal;

        $array = array("id_tryout"=>$list_item['id_tryout'],
            "id_mm_tryout_paket"=>$list_item['id_mm-tryout-paket'],
            "id_paket"=>$list_item['id_mm-tryout-paket']);

        //kondisi jika orang tua yang login maka aksi tidak akan ditampilkan 
        
        $list[] = $row;   

    }

    $output = array(
        "data" => $list,
        );
    echo json_encode($output);

}



}

