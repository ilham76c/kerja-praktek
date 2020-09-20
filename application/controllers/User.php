<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	/*private $gambar;*/
	function __construct() {
		parent::__construct();
		if($this->session->userdata('level') != 3){
			redirect(site_url('dlh/login'));
		}
		$this->load->model('PegawaiModel');
		$this->load->model('AkunModel');
	}
	function index() {
		$data['data'] = $this->PegawaiModel->getById($this->session->userdata('username'));		
		$this->load->view('user/index',$data);
	}
	function ganti_password() {		
		$this->load->view('user/ganti-password/page');
	}
	function ganti_password_aksi() {
		$post = $this->input->post();
		$username = $post['username'];
		
		if ($this->AkunModel->getPassword($username) == $post['password_lama']) {
			$this->password = $post['password_baru'];
			if ($this->AkunModel->updateAkun($username, $this)) {			
				$this->session->set_flashdata('status', 'sukses'); 
				redirect('user/ganti_password');				
			}
		}	
		$this->session->set_flashdata('status', 'gagal'); 
		redirect('user/ganti_password');										
	}
}
?>