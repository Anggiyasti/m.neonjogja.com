<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login extends MX_Controller{
	public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->library('sessionchecker');
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->model('Mlogin');
        $this->load->model('siswa/msiswa');

        $this->load->library('session');
        // $this->load->library('form_validation');
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
        	 'judul_halaman' => 'Login - Neon',
        	);

         $data['files'] = array( 

            APPPATH.'modules/login/views/v-login.php',

            // APPPATH.'modules/modulonline/views/v-edudrive.php',

            // // APPPATH.'modules/welcome/views/v-tampil-tes.php',

            // APPPATH.'modules/testimoni/views/v-footer.php',

        );

        $this->parser->parse('templating/index', $data );
    }

    public function validasiLogin() {

        $username = htmlspecialchars($this->input->post('username'));

        $password = md5($this->input->post('password'));



        if ($result = $this->Mlogin->cekUser($username, $password)) {

                //variabelSession

            $sess_array = array();

            foreach ($result as $row) {
                 $idPengguna = $row->id;

                $hakAkses = $row->hakAkses;

                    //membuat session

                $verifikasiCode = md5($row->regTime);

                $sess_array = array(

                    'id' => $idPengguna,

                    'USERNAME' => $row->namaPengguna,

                    'HAKAKSES' => $row->hakAkses,

                    'AKTIVASI' => $row->aktivasi,

                    'eMail' => $row->eMail,

                    'verifikasiCode' => $verifikasiCode,

                    'loggedin' => TRUE,



                    );

                $this->session->set_userdata($sess_array);



                if ($hakAkses == 'admin') {

                    redirect(base_url('index.php/admin'));

                } elseif ($hakAkses == 'guru') {

                    $guru = $this->Mlogin->cekGuru($this->session->userdata['id']);

                    foreach ($guru as $value) {
                        $namaGuru = $value->namaDepan .' '.$value->namaBelakang;
                        $this->session->set_userdata('id_guru', $value->id);
                        $this->session->set_userdata('NAMAGURU', $namaGuru);

                    }

                    redirect(site_url('guru/dashboard/'));

                } elseif ($hakAkses == 'siswa') {
                    $tampSiswa=$this->Mlogin->get_namaSiswa($idPengguna);
                    $namaSiswa = $tampSiswa['namaDepan'] . ' '  . $tampSiswa['namaBelakang']  ;
                         //set session nama Siswa
                   $this->session->set_userdata('NAMASISWA', $namaSiswa);
                   $this->cek_token();
                   redirect(site_url('welcome'));

               } elseif ($hakAkses == 'admin_cabang') {
                   redirect(site_url('admincabang'));
               } else {

                echo 'tidak ada hak akses';

            }

        }

        return TRUE;

        } else {

            $this->session->set_flashdata('notif', ' Username atau password salah');

            redirect(site_url('login'));

            return FALSE;

        }

    }

    function cek_token(){
        //select ada token atau enggak
        $token = $this->msiswa->get_token();
        if ($token) {
            //memiliki token
            $date1 = new DateTime($token['tanggal_diaktifkan']);
            // cek dulu statusna udah di aktivin atau belum
            if ($token['status']==1) {
                # udah diaktifin
             $date_diaktifkan = $date1->format('d-M-Y');
             $date_kadaluarsa =  date("d-M-Y", strtotime($date_diaktifkan)+ (24*3600*$token['masaAktif']));

             $date1 = new DateTime(date("d-M-Y"));
             $date2 = new DateTime($date_kadaluarsa);
             $sisa_aktif = $date2->diff($date1)->days;
                 if ($sisa_aktif != 0) {
                    //token aktif
                    $this->session->set_userdata(array('token'=>'Aktif','sisa'=>$sisa_aktif));
                }else{
                    //token habis
                    $this->session->set_userdata(array('token'=>'Habis'));
                }
            }else{
                    // token belum diaktifkan
                    $this->session->set_userdata(array('token'=>'BelumAktif'));
            }
        }else{
                // belum terdaftar di token
            $this->session->set_userdata(array('token'=>'TidakAda'));
        }
    }
}

?>