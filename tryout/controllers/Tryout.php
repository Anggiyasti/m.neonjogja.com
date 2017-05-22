<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class Tryout extends MX_Controller {

    public function __construct() {
        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->library('parser');
        $this->load->model('Mtryout');
        $this->load->model('siswa/msiswa');
        $this->load->library("pagination");

        $config['permitted_uri_chars'] = 'a-z 0-9~%.:&_\-'; 

        // $this->load->model('tesonline/Mtesonline');
        parent::__construct();
        $this->load->library('sessionchecker');
        $this->sessionchecker->checkloggedin();
         if ($this->session->userdata('HAKAKSES')=='ortu') {
       
    }else{
         $this->sessionchecker->cek_token();

    }

        # check session
        if ($this->session->userdata('loggedin') == true) {
            if ($this->session->userdata('HAKAKSES') == 'siswa') {

            } else if ($this->session->userdata('HAKAKSES') == 'guru') {
                redirect('guru/dashboard');
            }else if ($this->session->userdata('HAKAKSES') == 'ortu') {

            } 
            else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
        ##
    }


    //# fungsi indeks, mampilin to yang dikasih hak akses.
    public function index() {
            $this->session->unset_userdata('id_tryout');
            $data = array(
                'judul_halaman' => 'Neon - Tryout',
                'judul_header' => 'Daftar Tryout',
                'judul_tingkat' => '',
                );

            $konten = 'modules/tryout/views/mobile/vm-daftar-to.php';

            $data['files'] = array(
                APPPATH . 'modules/templating/views/anggi/v-sidebar.php',
                APPPATH.$konten,
                APPPATH . 'modules/templating/views/anggi/v-footer.php',

                );
            if ($this->session->userdata('HAKAKSES')=='ortu') {
                //untuk mengambil id siswa jika ortu yang login 
            $datas['id_siswa'] = $this->Mtryout->get_id_siswa_by_ortu();
            }else{
            $datas['id_siswa'] = $this->Mtryout->get_id_siswa();
        }
            ##KONFIGURASI UNTUUK PAGINATION
            $config = array();
            $config["base_url"] = base_url() . "tryout/index/";
            $config["uri_segment"] = 3;
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $config["total_rows"] = $this->Mtryout->get_tryout_akses_number($datas);
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
            $data['tryout'] = $this->Mtryout->get_tryout_akses($config["per_page"], $page, $datas);
            $data["links"] = $this->pagination->create_links();
            $penggunaID = $this->session->userdata['id'];
            $data['siswa'] = $this->load->msiswa->get_siswapoto($penggunaID);
            $this->parser->parse('templating/anggi/index', $data);
        
    }

    // bikin session untuk id to
    public function create_seassoin_idto($id_to) {
        $this->session->set_userdata('id_tryout', $id_to);
        redirect("tryout/daftarpaket");
    }

    // view daftar paket
    public function daftarpaket() {
            $id_to = $this->session->userdata('id_tryout');
            $datas['id_tryout'] = $id_to;
            $datas['id_pengguna'] = $this->session->userdata('id');

            if ($this->session->userdata('HAKAKSES')=='ortu') {
            //untuk mengambil id siswa jika ortu yang login 
            $datas['id_siswa'] = $this->Mtryout->get_id_siswa_by_ortu();
            }else{
            $datas['id_siswa'] = $this->msiswa->get_siswaid();
        }
            $data['nama_to'] = $this->Mtryout->get_tryout_by_id($id_to)[0]['nm_tryout'];
            $data_to = $this->Mtryout->get_tryout_by_id($id_to)[0];
            
            $date = new DateTime(date("Y-m-d H:i:s"));
            
            // concat tanggal mlai dan tanggai akhir
            $mulai = date("Y-m-d H:i:s ", strtotime($data_to['tgl_mulai']." ".$data_to['wkt_mulai']));
            $akhir = date("Y-m-d H:i:s ", strtotime($data_to['tgl_berhenti']." ".$data_to['wkt_berakhir']));

            //buat date
            $date_mulai =  new DateTime($mulai);
            $date_berhenti =  new DateTime($akhir);


            // kalo tanggal mulainya lebih dari hari ini dan kurang dari sama dengan tanggal berhenti
            if (($date>= $date_mulai) && ($date <= $date_berhenti)) {
                //TO BISA DI AKSES
                $status_to = 'doing';
            }else{
                //TO TIDAK BISA DI AKSES
                if ($date>=$date_berhenti) {
                    // SELESAI
                    $status_to = 'done';             
                }else{
                    // BELUM DIMULAI
                    $status_to = 'yet';             
                }
            }

            if (isset($id_to)) {
                $data = array(
                    'judul_halaman' => 'Neon - Daftar Paket',
                    'judul_header' => 'Tryout : ' . $data['nama_to'],
                    'judul_tingkat' => '',
                    'nama_to' => $data_to['nm_tryout'],
                    );

                // FILES
                $konten = 'modules/tryout/views/mobile/vm-daftar-paket.php';
                $data['files'] = array(
                    APPPATH . 'modules/templating/views/anggi/v-sidebar.php',
                    APPPATH . $konten,
                    APPPATH . 'modules/templating/views/anggi/v-footer.php',
                    );
                
                ##KONFIGURASI UNTUUK PAGINATION
                $config = array();
                $config["base_url"] = base_url() . "tryout/daftarpaket/";
                $config["uri_segment"] = 3;
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $config["total_rows"] = $this->Mtryout->get_paket_undo_number($datas);
                $config["per_page"] = 3;

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

                // DAFTAR PAKET
                $data['paket_dikerjakan'] = $this->Mtryout->get_paket_reported($datas);
                $data['paket'] = $this->Mtryout->get_paket_undo_pag($datas,$config["per_page"], $page);
                $data['status_to'] = $status_to;


                $penggunaID = $this->session->userdata['id'];
                $data['siswa'] = $this->load->msiswa->get_siswapoto($penggunaID);
                if ($this->session->userdata('HAKAKSES')=='ortu') {
                //untuk mengambil id siswa jika ortu yang login 
                $datas['id_siswa'] = $this->Mtryout->get_id_siswa_by_ortu();
                }else{
                $datas['id_siswa'] = $this->msiswa->get_siswaid();
                }
                $this->parser->parse('templating/anggi/index', $data);
                //unset session
                $this->session->unset_userdata('id_paketpembahasan');
                $this->session->unset_userdata('id_tryoutpembahasan');
                $this->session->unset_userdata('id_mm-tryoutpaketpembahasan');
            } else {
                //kalo gak ada session
                redirect('tryout');
            }
        
    }

     public function ajax_get_paket($id_tryout) {
        $data = $this->Mtryout->get_paket_by_id_to($id_tryout);

        $output = array('data' => $data);
        echo json_encode($output);
    }

//# fungsi indeks
    function buatto() {
        $data = array("id_paket" => $this->input->post('id_paket'),
            "id_tryout" => $this->input->post('id_tryout'),
            "id_mm-tryoutpaket" => $this->input->post('id_mm_tryoutpaket'),
            );
        $this->session->set_userdata('id_paket', $data['id_paket']);
        $this->session->set_userdata('id_tryout', $data['id_tryout']);
        $this->session->set_userdata('id_mm-tryoutpaket', $data['id_mm-tryoutpaket']);
        $insert = array("siswaID" => $this->msiswa->get_siswaid(),
            "id_mm-tryout-paket" => $this->session->userdata('id_mm-tryoutpaket'),
            "status_pengerjaan" => '2'
            );
    }

    function buatpembahasan() {
        $data = array("id_paket" => $this->input->post('id_paket'),
            "id_tryout" => $this->input->post('id_tryout'),
            "id_mm-tryoutpaket" => $this->input->post('id_mm_tryoutpaket'),
            );
        $this->session->set_userdata('id_paketpembahasan', $data['id_paket']);
        $this->session->set_userdata('id_tryoutpembahasan', $data['id_tryout']);
        $this->session->set_userdata('id_mm-tryoutpaketpembahasan', $data['id_mm-tryoutpaket']);
    }

//fungsi ilham
    public function mulaitest() {
        if (!empty($this->session->userdata['id_mm-tryoutpaket'])) {
            $id = $this->session->userdata['id_mm-tryoutpaket'];
            $data['topaket'] = $this->Mtryout->datatopaket($id);
//        echo $id;
            $id_paket = $this->Mtryout->datapaket($id)[0]->id_paket;
        $random = $this->Mtryout->dataPaketRandom($id_paket)[0]->random;

//        echo $id_paket; 
            $data['paket'] = $this->Mtryout->durasipaket($id_paket);
//        var_dump($data);

            $this->load->view('templating/t-header-soal');
            if ($random == 0) {
                $query = $this->load->Mtryout->get_soalnorandom($id_paket);
            }else{
                $query = $this->load->Mtryout->get_soal($id_paket);
            }
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];

////        var_dump($data);
            $this->load->view('v-to-baru.php', $data);
            // $this->load->view('mobile/v-halaman-to', $data);
            $this->load->view('templating/t-footer-soal', $data);
        } else {
            $this->errorTest();
        }
    }

    public function mulaipembahasan() {
        if (!empty($this->session->userdata['id_mm-tryoutpaketpembahasan'])) {
            $id = $this->session->userdata['id_mm-tryoutpaketpembahasan'];
            $data['topaket'] = $this->Mtryout->datatopaket($id);
            $id_paket = $this->Mtryout->datapaket($id)[0]->id_paket;

            $this->load->view('templating/t-headerto');
            $query = $this->load->Mtryout->get_pembahasan($id_paket);
        
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];
            $this->load->view('v-pembahasanto.php', $data);
            $this->load->view('footerpembahasan', $data);
        } else {
            $this->errorTest();
        }
    }

    public function errorTest() {
        $this->load->view('templating/t-headerto');
        $this->load->view('v-error-test.php');
    }

    public function cekJawaban() {
        $data = $this->input->post('pil');

       // var_dump($data);
       // echo $data[27][0];
        $id = $this->session->userdata['id_mm-tryoutpaket'];
        $id_paket = $this->Mtryout->datapaket($id)[0]->id_paket;
////   
        $result = $this->Mtryout->jawabansoal($id_paket);
//        var_dump($result);
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $koreksi = array();
        $idSalah = array();
        for ($i = 0; $i < sizeOf($result); $i++) {
            $id = $result[$i]['soalid'];
            // $data[$id];
            // echo $data[$id][0];
            // echo "<br>";
            // echo $result[$i]['jawaban'];
            if (!isset($data[$id])) {
                $kosong++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            } else if ($data[$id][0] == $result[$i]['jawaban']) {
                $benar++;
            } else {
                $salah++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            }
        }
//////
           // echo 'kosong = ' . $kosong;
           // echo 'Salah = ' . $salah;
           // echo 'benar = ' . $benar;
        //

        $hasil['id_pengguna'] = $this->session->userdata['id'];
        $hasil['siswaID'] = $this->msiswa->get_siswaid();
        $hasil['id_mm-tryout-paket'] = $this->session->userdata['id_mm-tryoutpaket'];
        ;
        $hasil['jmlh_kosong'] = $kosong;
        $hasil['jmlh_benar'] = $benar;
        $hasil['jmlh_salah'] = $salah;
        $hasil['total_nilai'] = $benar;
        $hasil['poin'] = $benar;
        $hasil['status_pengerjaan'] = 1;

        $result = $this->load->Mtryout->inputreport($hasil);
        $this->session->unset_userdata('id_mm-tryoutpaket');
        redirect(base_url('index.php/tryout'));
    }

    //end fungsi ilham

    public function pembahasanto() {
        if (!empty($this->session->userdata['id_pembahasan'])) {
            $id = $this->session->userdata['id_pembahasan'];
            $this->load->view('templating/t-headersoal');

            $query = $this->load->mtesonline->get_soal($id);
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];

            $this->load->view('vPembahasan.php', $data);
            $this->load->view('footerpembahasan.php');
        } else {
            $this->errorTest();
        }
    }

    public function cekmobile()
    {
        $this->load->library('user_agent');
$this->load->helper('url');

if ($this->agent->is_mobile())
{
    // redirect ke mobile
    redirect("http://m.neonjogja.com", 'refresh');

}
else
{
    redirect('http://www.neonjogja.com', 'refresh'); // go to 'desktop' controller, 'index()' function
}
    }

    public function score($id_paket)
    {
            $id_to = $this->session->userdata('id_tryout');
            $datas['id_tryout'] = $id_to;
            $datas['id_pengguna'] = $this->session->userdata('id');
            if ($this->session->userdata('HAKAKSES')=='ortu') {
                //untuk mengambil id siswa jika ortu yang login 
                $datas['id_siswa'] = $this->Mtryout->get_id_siswa_by_ortu();
                }else{
                $datas['id_siswa'] = $this->msiswa->get_siswaid();
                }
            $datas['id_paket'] = $id_paket;

            $data['nama_to'] = $this->Mtryout->get_tryout_by_id($id_to)[0]['nm_tryout'];
            $data_to = $this->Mtryout->get_tryout_by_id($id_to)[0];
            
            $date = new DateTime(date("Y-m-d H:i:s"));
            
            // concat tanggal mlai dan tanggai akhir
            $mulai = date("Y-m-d H:i:s ", strtotime($data_to['tgl_mulai']." ".$data_to['wkt_mulai']));
            $akhir = date("Y-m-d H:i:s ", strtotime($data_to['tgl_berhenti']." ".$data_to['wkt_berakhir']));

            //buat date
            $date_mulai =  new DateTime($mulai);
            $date_berhenti =  new DateTime($akhir);

            // nama paket
            $nm_paket = $this->Mtryout->get_paket_reported_score($datas)[0]['nm_paket'];


            if (isset($id_to)) {
                $data = array(
                    'judul_halaman' => 'Neon - Score Tryout',
                    'judul_header' => 'Tryout : ' . $data['nama_to'],
                    'judul_tingkat' => '',
                    'nama_to' => $data_to['nm_tryout'],
                    'nama_paket' => $nm_paket
                    );

                // FILES
                $konten = 'modules/tryout/views/mobile/v-score.php';
                $data['files'] = array(
                    APPPATH . 'modules/templating/views/anggi/v-sidebar.php',
                    APPPATH . $konten,
                    APPPATH . 'modules/templating/views/anggi/v-footer.php',
                    );
                // DAFTAR PAKET
                $data['paket_dikerjakan'] = $this->Mtryout->get_paket_reported_score($datas);
                $data['paket'] = $this->Mtryout->get_paket_undo($datas);

                // HITUNG NILAI
                $jmlh_benar = $data['paket_dikerjakan'][0]['jmlh_benar'];
                $jmlh_soal = $data['paket_dikerjakan'][0]['jumlah_soal'];
                $data['nilai'] = round(($jmlh_benar/$jmlh_soal)*100,2);

                $penggunaID = $this->session->userdata['id'];
                $data['siswa'] = $this->load->msiswa->get_siswapoto($penggunaID);
                if ($this->session->userdata('HAKAKSES')=='ortu') {
                //untuk mengambil id siswa jika ortu yang login 
                $datas['id_siswa'] = $this->Mtryout->get_id_siswa_by_ortu();
                }else{
                $datas['id_siswa'] = $this->msiswa->get_siswaid();
                }

                $this->parser->parse('templating/anggi/index', $data);
                //unset session
                $this->session->unset_userdata('id_paketpembahasan');
                $this->session->unset_userdata('id_tryoutpembahasan');
                $this->session->unset_userdata('id_mm-tryoutpaketpembahasan');
            } else {
                //kalo gak ada session
                redirect('tryout');
            }
        
    }
    public function report_to(){
        $list = $this->Mtryout->get_laporan_to();
        $array = [];
        foreach ($list as $item ) {

            $tempt = ['label'=>$item['nm_tryout'],'y'=> (int)number_format($item['nilai'],1)];
            $array[] = $tempt;
        }
      echo json_encode($array);

    }
}
?>