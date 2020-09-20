<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinas extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('level') != 2){
			redirect(site_url('dlh/login'));
		}
		$this->load->model('PegawaiModel');		
		$this->load->model('AkunModel');
	}

	function index() {
		$data['data'] = $this->PegawaiModel->selectAllData();
		$this->load->view('admin/admin-dinas/index', $data);	
	}
	function data() {		
		$this->load->view('admin/admin-dinas/data-pegawai/page');
	}
	function ganti_password() {		
		$this->load->view('admin/admin-dinas/form/form-ganti-password');
	}
	function ganti_password_aksi() {
		$post = $this->input->post();
		$username = $post['username'];
		
		if ($this->AkunModel->getPassword($username) == $post['password_lama']) {
			$this->password = $post['password_baru'];
			if ($this->AkunModel->updateAkun($username, $this)) {			
				$this->session->set_flashdata('status', 'sukses'); 
				redirect('dinas/ganti_password');				
			}
		}	
		$this->session->set_flashdata('status', 'gagal'); 
		redirect('dinas/ganti_password');										
	}
	function form_aksi_pegawai($aksi, $nip="") {
		switch ($aksi) {
			case 'add':
				$post = $this->input->post();
				$this->nip = $post['nip'];
				$this->nama = $post['nama'];
				$this->tanggal_lahir = $post['tanggal_lahir'];
				$this->tempat_lahir = $post['tempat_lahir'];
				$this->pendidikan = $post['pendidikan'];
				$this->golongan = $post['golongan'];
				$this->pangkat = $post['pangkat'];				
				$this->tmt_pangkat = $post['tmt_pangkat'];
				$this->jabatan = $post['jabatan'];
				$this->pensiun = $post['pensiun'];
				if ($this->PegawaiModel->insertData($this)) {
					$this->session->set_flashdata('status', 'sukses');
					redirect('dinas/form_dinas/tambah');
				}
				else {
					$this->session->set_flashdata('status', 'gagal');
					redirect('dinas/form_dinas/tambah');
				}
				break;
			case 'update':
				$post = $this->input->post();				
				$this->nama = $post['nama'];		
				$this->tanggal_lahir = $post['tanggal_lahir'];
				$this->tempat_lahir = $post['tempat_lahir'];
				$this->pendidikan = $post['pendidikan'];
				$this->golongan = $post['golongan'];
				$this->pangkat = $post['pangkat'];				
				$this->tmt_pangkat = $post['tmt_pangkat'];
				$this->jabatan = $post['jabatan'];
				$this->pensiun = $post['pensiun'];
				
				if ($this->PegawaiModel->updateData($post['nip'], $this)) {
					redirect('dinas/index');
				}
				break;
			case 'delete':
				if ($this->PegawaiModel->deleteData($nip)) {
					redirect('dinas/index');
				}
				break;
			default:
				show_404();
				break;
		}
	}

	function form_dinas($aksi) {
		switch ($aksi) {
			case 'tambah':
				$data['tombol'] = 'Tambah';
				$data['aksi'] = 'dinas/form_aksi_pegawai/add';
				$this->load->view('admin/admin-dinas/form/form', $data);
				break;
			case 'edit':				
				$data['tombol'] = 'Simpan';
				$data['aksi'] = 'dinas/form_aksi_pegawai/update';
				$data['data'] = $this->PegawaiModel->getById($_GET['nip']);
				$this->load->view('admin/admin-dinas/form/form', $data);
				break;			
			default:
				show_404();
				break;
		}
	}
	
	function generateXls() {
        // create file name
        //$filename = 'Data-'.date("d-M-y h:i").'.xlsx';  
        // load excel library
        $this->load->library('excel');

        /*$listInfo = $this->export->exportList();*/
        $listInfo = $this->PegawaiModel->selectAllData();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'NIP');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'NAMA');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'TEMPAT, TANGGAL LAHIR');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'PENDIDIKAN');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'GOLONGAN');    
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'PANGKAT');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'TMT PANGKAT');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'JABATAN');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'PENSIUN');

        $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
        	
            $objPHPExcel->getActiveSheet()->SetCellValueExplicit('A'.$rowCount, $list->nip, PHPExcel_Cell_DataType::TYPE_STRING);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $list->nama);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $list->ttl);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $list->pendidikan);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $list->golongan);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $list->pangkat);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $list->tmt_pangkat);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $list->jabatan);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $list->pensiun);
    	
            $rowCount++;
        }
      	
		$objPHPExcel->getActiveSheet()->getStyle("A1:I".($rowCount-1))->applyFromArray(
		    array(
		        'borders' => array(
		            'allborders' => array(
		                'style' => PHPExcel_Style_Border::BORDER_THIN,
		                'color' => array('rgb' => '000000')
		            )
		        )
		    )
		);
        /*$objPHPExcel->getActiveSheet()->getStyle('A2:A100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);*/
        /*$objPHPExcel->getActiveSheet()->getStyle('A2:A100')->setQuotePrefix(true);*/
        $filename = 'Data '. date('d-M-y').'.xlsx';
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');         
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
        $objWriter->save('php://output'); 
 
    }
}

?>