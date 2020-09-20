<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class LoginModel extends CI_Model {
	protected $table = 'tbl_akun';
	protected $col_username = 'username';

	function getUserData($username){		
		return $this->db->get_where($this->table, array($this->col_username => $username))->row();
	}

	// function getUsernameData($username) {
	// 	/*$where = array('username' => $username);*/
	// 	$query = $this->db->get_where('tbl_akun', array('username' => $username));
	// 	$row = $query->row_array();
	// 	$sum = $query->num_rows();
	// 	return array($sum, $row['password'], $row['level']);
	// }

	public function getUsernameSession($username) {
		/*$where = array('username' => $username);*/
		$query = $this->db->get_where('tbl_akun', array('username' => $username));
		$row = $query->row_array();
		return array('username' => $row['username'], 'email' => $row['email'], 'level' => $row['level'], 'login' => true);
	}

	function getUsernameLevel($username) {
		/*$where = array('username' => $username);*/
		$query = $this->db->get_where('tbl_akun', array('username' => $username));
		$row = $query->row_array();
		return $row['level'];
	}
}

?>