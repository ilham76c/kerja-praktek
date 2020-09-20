<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

Class SosmedModel extends CI_Model {
	protected $table = 'tbl_sosmed';
	protected $column_url = 'url';
	protected $column_status = 'sttus';
	protected $column_icon = 'icon';

	function insertData($data) {
		return $this->db->insert($this->table, $data);
	}
	function updateURL($id, $data) {
		//$this->db->set('sosmed', $data[0], false);		
		$this->db->where('id', $id);
		return $this->db->update($this->table, array($this->column_url => $data));
	}	
	function updateSTATUS($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update($this->table, array($this->column_status => $data));
	}
	function selectAllData() {
		//$this->db->select($this->column_url,$this->column_status,$this->column_icon);
		//$this->db->from($this->table);
		return $this->db->get($this->table)->result();
	}
	function getCols() {
		$this->db->select('url,ion_icon'); 
    	$this->db->from($this->table);       	
    	$this->db->where('sttus', 1);
    	return $this->db->get()->result();
	}
}
?>