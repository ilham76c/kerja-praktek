<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class BeritaModel extends CI_Model {

	protected $table = 'tbl_berita';		
	
	// function insertData($judul, $isi, $id_gambar="default") {
	// 	$query = $this->db->query('INSERT INTO tbl_berita (judul, isi, id_gambar) VALUES("'.$judul.'", "'.$isi.'", "'.$id_gambar.'")');
	// 	return ($this->db->affected_rows() != 1) ? false : true;
	// }
	
	function insertData($data) {				
		return $this->db->insert($this->table, $data);
	}

	function updateData($id, $data) {		
		return $this->db->update($this->table, $data, array('id' => $id));
	}

	function deleteData($id) {		
		return $this->db->delete($this->table, array('id' => $id));
	}

	function selectAllData() {
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->table)->result();
		
	}
	function getById($id){		
		return $this->db->get_where($this->table, array('id' => $id))->row();
	}

	function getCount() {
		return $this->db->count_all($this->table);
	}
	function getList($limit, $start){
        return $this->db->get($this->table, $limit, $start)->result();        
    }

    function getLimit() {
    	$this->db->order_by("id", "desc");
		$this->db->limit(4);

		return $this->db->get($this->table)->result();
    }
	// Get user by id
    function getDataById($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get($this->table);
        $result = $q->result_array();
        return $result;
    }

    // Get all user list
    function getDataList($limit, $start){
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        // $q = $this->db->get($this->table);
        // $result = $q->result_array();
        return $this->db->get($this->table)->result();
    }

	// Update record by id
	// function updateData() {
	// 	$name = trim($postData['txt_name']);
	// 	$email = trim($postData['txt_email']);
	// 	if ($name != '' && $email != '') {
	// 		// Update
	// 		$value = array('name' => $name , 'email' => $email);
	// 		$this->db->where('id',$id);
	// 		$this->db->update('users',$value);
	// 	}
	// }	
}

?>