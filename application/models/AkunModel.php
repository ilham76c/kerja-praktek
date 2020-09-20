<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class AkunModel extends CI_Model {	
	protected $table_akun = 'tbl_akun';

	function createAkun($data) {
		$this->username = $data->nip;		
		$this->password = $data->nip;
		$this->level = 3;		
		$this->db->insert($this->table_akun, $this);
	}
	function updateAkun($username, $data) {					
		return $this->db->update($this->table_akun, $data, array('username' => $username));		
	}
	function deleteAkun($username) {
		return $this->db->delete($this->table_akun, array('username' => $username));
	}
	function getPassword($username) {
		$this->db->select('password'); 
    	$this->db->from($this->table_akun);   
    	$this->db->where('username', $username);
    	return $this->db->get()->row()->password;
	}	
}
?>