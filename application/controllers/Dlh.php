<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dlh extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	private $username;
	private $password;
	function __construct() {
		parent::__construct();
		$this->load->model('LoginModel');	
		$this->load->model('BeritaModel');
		$this->load->model('SosmedModel');
		$this->load->model('ProfilModel');

		/*$this->load->helper('url');*/
		$this->load->library('BeritaLibrary');		
		$this->load->library('pagination');
		/*$this->load->library('form_validation');
      $this->load->helper('file');*/
	}
	function index() {
		$data['sosmed'] = $this->SosmedModel->getCols();
		$data['profil'] = $this->ProfilModel->selectData();
		$data['data'] = $this->BeritaModel->getLimit();
		$this->load->view('website/index',$data);
	}
	
	function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		redirect('dlh/login');
	}
	function login() {	
		$this->load->view('login/login');
	}	
	function aksi_login() {		
		if ($this->cekLogin()) {
			switch ($this->session->userdata('level')) {
				case 1:
					redirect('admin/index');
					break;
				case 2:
					redirect('dinas/index');
					break;
				case 3:
					redirect('user/index');
					break;
				default:
					show_404();
					break;
			}
		}
		else {
			$this->session->set_flashdata('username', $this->username); 
			$this->session->set_flashdata('password', $this->password); 
			$this->session->set_flashdata('error', 'Username atau Password Salah!!'); 
			redirect('dlh/login');
		}				
	}
	private function cekLogin() {
		$post = $this->input->post();
		$this->username = $post['username'];
		$this->password = $post['password'];
		$data = $this->LoginModel->getUserData($this->username);
		if ($data) {
			if ($data->username == $this->username) {
				if ($data->password == $this->password) {										
					$this->session->set_userdata(array('username' => $this->username, 'level' => $data->level));
					return true;					
				}
			}
		}
		return false;
	}
	function berita()	{		
		$data['sosmed'] = $this->SosmedModel->getCols();

		//konfigurasi pagination
        $config['base_url'] = site_url('dlh/berita'); //site url
        $config['total_rows'] = $this->BeritaModel->getCount(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->BeritaModel->getDataList($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

		//$data['data'] = $this->BeritaModel->selectAllData();
		$this->load->view('website/berita/index', $data);
	}
	
	
}
