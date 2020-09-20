<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class ProfilModel extends CI_Model {

	protected $table = 'tbl_konten';
	protected $column_konten = 'konten';
	function updateData($data) {
		$this->db->where('id', 1);
		return $this->db->update($this->table, array($this->column_konten => $data));
	}
	function selectData(){		
		return $this->db->get_where($this->table, array('id' => 1))->row('konten');
	}	
}
?>