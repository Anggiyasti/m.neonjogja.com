<?php 

class Ortuback_model extends CI_Model{

	/*Mengambil report berdasarkan nilai*/
	function get_report_nilai($id_ortu){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna", $id_ortu);
		$this->db->where("l.jenis = 'nilai'");
		$this->db->order_by("l.id", 'desc');


		$query = $this->db->get();
		return $query->result_array();
	}	

	/*Mengambil report berdasarkan absen*/
	function get_report_absen($id_ortu){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna", $id_ortu);
		$this->db->where("l.jenis = 'absen'");
		$this->db->order_by("l.id", 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}	

	/*Mengambil report berdasarkan umum*/
	function get_report_umum($id_ortu){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna", $id_ortu);
		$this->db->where("l.jenis = 'umum'");
		$this->db->order_by("l.id", 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}	

	public function ortu($idPengguna)
    {
       $this->db->select('id,namaOrangTua');
       $this->db->from('tb_orang_tua');
       $this->db->where('penggunaID',$idPengguna);
       $query = $this->db->get();

       if ($query->num_rows() == 1) {
            return  $query->result_array()[0]; //if data is true
        } else {
            return array(); //if data is wrong
        }
       
    }

	/*Mengambil semua report*/
	function get_report_all($id,$perpage,$page){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi,l.id');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna",$id );
		$this->db->order_by("l.id", 'desc');
		
		$query = $this->db->get('tb_orang_tua o',$perpage,$page);
		return $query->result_array();
	}	


	/*Mengambil semua report*/
	function get_report_all_number($id){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna",$id );
		$this->db->order_by("l.id", 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*Mengambil semua report*/
	function get_report_all_datail($id,$pengguna){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna",$pengguna );
		$this->db->where("l.id",$id);
		$this->db->order_by("l.id", 'desc');
		$query = $this->db->get('tb_orang_tua o');
		return $query->result_array();
	}	
	/*Mengambil report berdasarkan nilai*/
	function get_nama($id_ortu){
		$this->db->select('s.id, s.namaDepan, s.namaBelakang, o.namaOrangTua');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s', 'o.siswaID=s.id');
		$this->db->where("o.penggunaID", $id_ortu);

		$query = $this->db->get();
		return $query->result_array();
	}	

	 public function namasiswa($id) {
        $query = "SELECT * FROM `tb_orang_tua` ortu 
				JOIN tb_siswa sis ON ortu.siswaID = sis.id 
				JOIN `tb_pengguna` peng ON peng.id = sis.penggunaID 
				WHERE `peng`.`namaPengguna`= '$id'";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function get_Ortu($ortuID='')
	{
		$this->db->select('*');
		$this->db->from('tb_orang_tua');
		$this->db->where('penggunaID',$ortuID);
		$query = $this->db->get();
		return $query->result_array();
	}

	/*Mengambil semua kelas*/
	function jenis($id,$jenis){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi,l.id');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna", $id);
		$this->db->order_by("l.id", 'desc');
		if ($jenis!='all') {
			$this->db->where("jenis",$jenis);
		}

		$query = $this->db->get();
		return $query->result_array();
	}


	/*Mengambil semua kelas*/
	function jenis_number($id){
		$this->db->select('o.namaOrangTua, l.jenis, l.isi,l.id');
		$this->db->from('tb_orang_tua o');
		$this->db->join('tb_siswa s ',' o.siswaID = s.id');
		$this->db->join('tb_laporan_ortu l', 'o.id=l.id_ortu');
		$this->db->join('tb_pengguna peng ',' peng.id = s.penggunaID');
		$this->db->where("peng.namaPengguna", $id);
		$this->db->order_by("l.id", 'desc');

		$query = $this->db->get();
		return $query->num_rows();
	}	

}

?>