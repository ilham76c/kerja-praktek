<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/*private $gambar;*/
	function __construct() {
		parent::__construct();
		if($this->session->userdata('level') != 1){
			redirect(site_url('dlh/login'));
		}

		$this->load->model('SosmedModel');
		$this->load->model('ProfilModel');
		$this->load->model('AkunModel');

		$this->load->library('pagination');		
		$this->load->library('BeritaLibrary');				
		/*$this->load->library('form_validation');
      $this->load->helper('file');*/
	}

	function index() {
		$this->load->view('admin/admin-web/index');				
	}
	function profil_aksi() {
		$post = $this->input->post();
		$this->profil = $post['editor1'];
		if ($this->ProfilModel->updateData($this->profil)) {
			$this->session->set_flashdata('status', 'sukses'); 
			redirect('admin/kelola/konten');
		}
		else {
			$this->session->set_flashdata('status', 'gagal'); 
			redirect('admin/kelola/konten');
		}
	}
	function ganti_password_aksi() {
		$post = $this->input->post();
		$username = $post['username'];
		
		if ($this->AkunModel->getPassword($username) == $post['password_lama']) {
			$this->password = $post['password_baru'];
			if ($this->AkunModel->updateAkun($username, $this)) {			
				$this->session->set_flashdata('status', 'sukses'); 
				redirect('admin/kelola/ganti_password');
			}
		}	
		$this->session->set_flashdata('status', 'gagal'); 
		redirect('admin/kelola/ganti_password');
	}
	function kelola($menu) {
		switch ($menu) {			
			case 'konten':				
				$data['data'] = $this->ProfilModel->selectData();
				$this->load->view('admin/admin-web/kelola-konten/page', $data);
				break;
			case 'berita':				
				$data['data'] = $this->BeritaModel->selectAllData();
				$this->load->view('admin/admin-web/kelola-berita/page', $data);
				break;
			case 'sosmed':
				$data['data'] = $this->SosmedModel->selectAllData();
				$this->load->view('admin/admin-web/kelola-sosmed/page', $data);
				break;
			case 'ganti_password':
				$this->load->view('admin/admin-web/form/form-ganti-password');
				break;
			default:
				show_404();
				break;
		}
	}
	
	function berita()	{		
		$data['data'] = $this->BeritaModel->selectAllData();
		$this->load->view('admin/admin-web/kelola-berita/page', $data);
	}
	
	function form_aksi($aksi, $id='') {
		switch ($aksi) {
			case 'add':				
				if ($this->beritalibrary->save()) {
					redirect('admin/berita');
				}				
				break;
			case 'update':
				if ($this->beritalibrary->update($id)) {
					redirect('admin/berita');
				}
				break;
			case 'delete':
				if ($this->beritalibrary->delete($id)) {
					redirect('admin/berita');	
				}
				break;
			default:
				show_404();
				break;
		}
	}

	function form($form='') {	
		switch ($form) {
			case 'tambah':
				$data['tombol'] = 'Post';
				$data['aksi'] = 'admin/form_aksi/add';
				$this->load->view('admin/admin-web/form/form-berita', $data);	
				break;
			case 'edit':
				$data['tombol'] = 'Perbarui';
				$data['aksi'] = 'admin/form_aksi/update/'.$_GET['id'].'';			
				$data['data'] = $this->BeritaModel->getById($_GET['id']);
				$this->load->view('admin/admin-web/form/form-berita', $data);	
				break;			
			default:
				show_404();
				break;
		}		
	}	
}

?>