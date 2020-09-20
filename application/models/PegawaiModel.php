<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class PegawaiModel extends CI_Model {
	protected $table_pegawai = 'tbl_pegawai';
	protected $table_profil = 'tbl_profil';
	protected $table_pendidikan = 'tbl_pendidikan';
	protected $table_golongan = 'tbl_golongan';
	protected $table_pangkat = 'tbl_pangkat';
	protected $table_pensiun = 'tbl_pensiun';
	function __construct() {
    	parent::__construct();
    	$this->load->model('AkunModel');
	}

	function insertData($data) {	
		if (!$this->exists($data->nip)) {
			//$this->AkunModel->createAkun($data);
			$this->db->insert($this->table_pegawai, array('nip' => $data->nip));
			$this->db->insert($this->table_profil, array('id_profil' => $data->nip, 'nama' => $data->nama, 'tanggal_lahir' => $data->tanggal_lahir, 'tempat_lahir' => $data->tempat_lahir));
			$this->db->insert($this->table_pendidikan, array('id_pendidikan' => $data->nip, 'pendidikan' => $data->pendidikan));
			$this->db->insert($this->table_golongan, array('id_golongan' => $data->nip, 'golongan' => $data->golongan, 'jabatan' => $data->jabatan));
			$this->db->insert($this->table_pensiun, array('id_pensiun' => $data->nip, 'tahun_pensiun' => $data->pensiun));
			$this->db->insert($this->table_pangkat, array('id_pangkat' => $data->nip, 'pangkat' => $data->pangkat, 'tmt_pangkat' => $data->tmt_pangkat));
			return true;
		}
		return false;
	}
	function updateData($nip, $data) {
		//return $this->db->update($this->table_pegawai, $data, array('nip' => $nip));
		//$this->db->update($this->table_pegawai, array('nip' => $data->nip));
		$this->db->update($this->table_profil, array('nama' => $data->nama, 'tanggal_lahir' => $data->tanggal_lahir, 'tempat_lahir' => $data->tempat_lahir), array('id_profil' => $nip));
		$this->db->update($this->table_pendidikan, array('pendidikan' => $data->pendidikan), array('id_pendidikan' => $nip));
		$this->db->update($this->table_golongan, array('golongan' => $data->golongan, 'jabatan' => $data->jabatan), array('id_golongan' => $nip));
		$this->db->update($this->table_pensiun, array('tahun_pensiun' => $data->pensiun), array('id_pensiun' => $nip));
		$this->db->update($this->table_pangkat, array('pangkat' => $data->pangkat, 'tmt_pangkat' => $data->tmt_pangkat), array('id_pangkat' => $nip));
			return true;
	}
	function deleteData($nip) {	
		//$this->AkunModel->deleteAkun($nip);
		return $this->db->delete($this->table_pegawai, array('nip' => $nip));
	}
	function selectAllData() {
		/*$this->db->order_by('id', 'desc');		
		return $this->db->get($this->table_pegawai)->result();*/
		$this->db->select('*');
		$this->db->from('tbl_pegawai a');	
	    $this->db->join('tbl_profil b', 'b.id_profil=a.nip', 'inner');
	    $this->db->join('tbl_pendidikan c', 'c.id_pendidikan=a.nip', 'inner');    	    
	    $this->db->join('tbl_golongan d', 'd.id_golongan=a.nip', 'inner');
	    $this->db->join('tbl_pangkat e', 'e.id_pangkat=a.nip', 'inner');
	    $this->db->join('tbl_pensiun f', 'f.id_pensiun=a.nip', 'inner');
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0){
	        return $query->result();
	    }
	    else{
	        return false;
	    }
	}
	function getById($nip){		
		//return $this->db->get_where($this->table_pegawai, array('nip' => $nip))->row();
		$this->db->select('*');
		$this->db->from('tbl_pegawai a');	
	    $this->db->join('tbl_profil b', 'b.id_profil=a.nip', 'inner');
	    $this->db->join('tbl_pendidikan c', 'c.id_pendidikan=a.nip', 'inner');    	    
	    $this->db->join('tbl_golongan d', 'd.id_golongan=a.nip', 'inner');
	    $this->db->join('tbl_pangkat e', 'e.id_pangkat=a.nip', 'inner');
	    $this->db->join('tbl_pensiun f', 'f.id_pensiun=a.nip', 'inner');
	    $this->db->where('a.nip',$nip);
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0){
	        return $query->row();
	    }
	    else{
	        return false;
	    }
	}	
	private function exists($nip) {
		return $this->db->get_where($this->table_pegawai, array('nip' => $nip))->num_rows();
	}
}
?>