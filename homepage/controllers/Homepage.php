<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->model('Mhomepage');
        
    }

    public function index() {
        $data['file'] = 'v-container.php';

        $this->parser->parse('v-index-homepage', $data);
    }
    
    function addpesan() {
        $data['name'] = htmlspecialchars($this->input->post('namalengkap'));
        $data['phone'] = htmlspecialchars($this->input->post('telepon'));
        $data['alamat'] = htmlspecialchars($this->input->post('email'));
        $data['pesan'] = htmlspecialchars($this->input->post('pesan'));
        $this->Mhomepage->insert_pesan($data);
    }

     function addsubs() {

        $data['email'] = htmlspecialchars($this->input->post('emailsubs'));

        if ($this->Mhomepage->mail_exists($data['email'] == true)) {
               $this->Mhomepage->insert_subs($data);
               $this->session->set_flashdata('subs', '1');
                // return Json(    
                //     // status = "success"
                //     subs = "done";
                // );
               // t TRUE;
        }else{
             $this->session->set_flashdata('subs', '2');
             // return Json({
             //        // status = "success"
             //        subs = "fail"
             // });
             // echo FALSE;
        }
    }

    
}
