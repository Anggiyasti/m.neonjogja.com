<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ortuback extends MX_Controller {
	private $hakakses;
// jika login sebagai orang tua tidak perlu cek token
	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Ortuback_model');
		$this->load->model('tingkat/Mtingkat');
		$this->load->model( 'siswa/msiswa' );
		$this->load->model( 'tingkat/MTingkat' );
		$this->load->library('sessionchecker');
		$this->load->library("pagination");
        $this->sessionchecker->checkloggedin();

		$this->hakakses = $this->gethakakses();
	}

	//GET HAK AKSES
	function gethakakses(){
		return $this->session->userdata('HAKAKSES');
	}
	//GET HAK AKSES

	// LOAD PARSER SESUAI HAK AKSES
	public function loadparser($data){
		$this->hakakses = $this->gethakakses();
		if ($this->hakakses=='ortu') {
			$this->parser->parse('templating/anggi/index', $data);
		}elseif ($this->hakakses=='siswa'){
			$this->parser->parse('templating/anggi/index', $data); 		
		}else{
			echo "forbidden access";    		
		}
	}
	// LOAD PARSER SESUAI HAK AKSES

	public function test()
	{
		$data['judul_halaman'] = "Laporan Orang Tua";

		$hakAkses = $this->session->userdata['HAKAKSES'];

			$data['files'] = array(
				APPPATH . 'modules/ortuback/views/v-daftar-report.php',
				);
			$all_report = $this->Ortuback_model->get_report(4);

		$n=1;
		$data['report']=array(); 
		foreach ( $all_report as $item ) {
		
			$data['report'][]=array(
                'namaortu'=>$item['namaOrangTua'],
               );
		}

			$this->loadparser($data);

	}

	//laporan ortu ajax
	public function index(){
		// kodisi jika login sebagai ortu, maka id pengguna yang digunakan berbeda dengan siswa
		if ($this->session->userdata('HAKAKSES')=='ortu') {
            $id_pengguna = $this->session->userdata('NAMAORTU');  
        }else{
            $id_pengguna = $this->session->userdata('USERNAME');  
        } 
		$namadepan = $this->Ortuback_model->namasiswa($id_pengguna)[0]['namaDepan'];
		$namabelakang = $this->Ortuback_model->namasiswa($id_pengguna)[0]['namaBelakang'];
			
		$data['judul_halaman'] = "Laporan $namadepan $namabelakang";

		$hakAkses = $this->session->userdata['HAKAKSES'];
		$data = array(
        'judul_halaman' => 'Neon - Daftar Latihan',
        'judul_header' => 'History Pesan',
        'judul_tingkat' => '',
        );
		$data['files'] = array(
			APPPATH.'modules/templating/views/anggi/v-sidebar.php',
			APPPATH . 'modules/ortuback/views/vm-daftar-report2.php',
			APPPATH.'modules/templating/views/anggi/v-footer.php',
		);

		$config = array();
            $config["base_url"] = base_url() . "ortuback/index/";
            $config["uri_segment"] = 3;
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $config["total_rows"] = $this->Ortuback_model->get_report_all_number($id_pengguna);
            $config["per_page"] = 5;

            # konfig link
                $config['cur_tag_open'] = "<a style='background:#800000;color:white'>";
                $config['cur_tag_close'] = '</a>';
                $config['first_link'] = "<span title='Page Awal'> << </span>"; 
                $config['last_link'] = "<span title='Page Akhir'> >> </span>";

                # konfig link

                $this->pagination->initialize($config);
                ##KONFIGURASI UNTUUK PAGINATION
		$data['jumlah_postingan'] = $config['total_rows'];
        $data["links"] = $this->pagination->create_links();
		// get report berdasarkan nilai
		$report_nilai = $this->Ortuback_model->get_report_nilai($id_pengguna);

		// get report berdasarkan absen
		$report_absen = $this->Ortuback_model->get_report_absen($id_pengguna);

		// get report berdasarkan umum
		$report_umum = $this->Ortuback_model->get_report_umum($id_pengguna);

		$data['pesan'] = $this->Ortuback_model->get_report_all($id_pengguna,$config["per_page"], $page);
		  $penggunaID = $this->session->userdata['id'];
                $data['siswa'] = $this->load->msiswa->get_siswapoto($penggunaID);
                $data['tingkat'] = $this->load->MTingkat->gettingkat();

		$data['namaortu'] = $report_nilai[0]['namaOrangTua'];

		$n=1;

		// untuk nampung report nilai
		$data['nilai']=array(); 
		foreach ( $report_nilai as $item ) {
		
			$data['nilai'][]=array(
                'namaortu'=>$item['namaOrangTua'],
                'jenis'=>$item['jenis'],
                'isi'=>$item['isi'],
               );
		}

		// untuk nampung report absen
		$data['absen']=array(); 
		foreach ( $report_absen as $item ) {
		
			$data['absen'][]=array(
                'namaortu'=>$item['namaOrangTua'],
                'jenis'=>$item['jenis'],
                'isi'=>$item['isi'],
               );
		}

		// untuk nampung report umum
		$data['umum']=array(); 
		foreach ( $report_umum as $item ) {
		
			$data['umum'][]=array(
                'namaortu'=>$item['namaOrangTua'],
                'jenis'=>$item['jenis'],
                'isi'=>$item['isi'],
               );
		}

		 $this->loadparser($data);

	}

	

	//laporan ortu ajax
	public function report_ajax($jenis="all"){

		$datas = ['jenis'=>$jenis];
		// kodisi jika login sebagai ortu, maka id pengguna yang digunakan berbeda dengan siswa
		if ($this->session->userdata('HAKAKSES')=='ortu') {
            $id_pengguna = $this->session->userdata('NAMAORTU');  
        }else{
            $id_pengguna = $this->session->userdata('USERNAME');  
        } 
		
		$all_report = $this->Ortuback_model->get_report_all($datas,$id_pengguna);

		$data = array();
		$n=1;
		foreach ( $all_report as $item ) {
		
			$row = array();
			$row[] = $n;
			$row[] = $item ['jenis'];
			$row[] = $item ['isi'];

			$data[] = $row;
			$n++;
		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );
	}

	public function ajax_ortuID()
{
  $guruID=$this->session->userdata['id'];
  $arrMapel=$this->Ortuback_model->get_Ortu($guruID);
  echo json_encode($arrMapel);
}


public function detail($id){
	if ($this->session->userdata('HAKAKSES')=='ortu') {
            $id_pengguna = $this->session->userdata('NAMAORTU');  
        }else{
            $id_pengguna = $this->session->userdata('USERNAME');  
        } 
	 $data = array(
        'judul_halaman' => 'Neon - Pilih Mata Pelajaran',
        'judul_header' => 'Latihan Online'
        );
    
    $data['files'] = array(
        APPPATH.'modules/templating/views/anggi/v-sidebar.php',
        APPPATH . 'modules/ortuback/views/v-daftar-detail.php',
        APPPATH.'modules/templating/views/anggi/v-footer.php',
        );
    $data['pesan'] = $this->Ortuback_model->get_report_all_datail($id,$id_pengguna);
    

    $this->parser->parse('templating/anggi/index', $data);


}

// function get kelas
	public function get_jenis( $jenis ) {
		// kodisi jika login sebagai ortu, maka id pengguna yang digunakan berbeda dengan siswa
		if ($this->session->userdata('HAKAKSES')=='ortu') {
            $id_pengguna = $this->session->userdata('NAMAORTU');  
        }else{
            $id_pengguna = $this->session->userdata('USERNAME');  
        }
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->Ortuback_model->jenis($id_pengguna,$jenis) ) );
	}


}

?>