<?php 
if ( ! defined('BASEPATH'))
 exit('No direct script access allowed');

require 'object-class/BeritaObject.php';
class BeritaLibrary {

   protected $CI;   
   protected $old_uniqid_gambar;

   private $uniqid_gambar;
   private $path = './upload/img-berita/';
   private $path_thumbnail_small = './upload/img-berita/thumbnail/small/';
   private $path_thumbnail_medium = './upload/img-berita/thumbnail/medium/';
   private $path_thumbnail_large = './upload/img-berita/thumbnail/large/';

   public $gambar = 'default.jpg';
   public $judul;
   public $isi;
   

   // We'll use a constructor, as you can't directly call a function
   // from a property definition.
   public function __construct(){
      // Assign the CodeIgniter super-object
      $this->CI =& get_instance();
      $this->CI->load->model('BeritaModel');
      $this->CI->load->helper(array('form', 'url'));       
   }

   /*function semuaData() {
      $data = array();
      $result = $this->CI->BeritaModel->getDataList();
      foreach ($result as $val) {
         $berita_object = new BeritaObject($val['id'], $val['judul'], $val['isi'], $val['gambar'], $val['tanggal']);
         $data[] = $berita_object;
      }
      return $data;
   }*/
   /* WORK!! -> Tidak Digunakan */
   public function resizeImage($file_name) {
      $source_path = './upload/img-berita/'.$file_name;
      $target_path = './upload/img-berita/thumbnail/';
      $config_manip = array(
         'image_library' => 'gd2', 
         'source_image' => $source_path,
         'new_image' => $target_path,
         'maintain_ratio' => TRUE,
         'create_thumb' => TRUE,
         'thumb_marker' => '_thumb',
         'width' => 150,
         'height' => 150
      );

      /*$this->CI->load->library('image_lib', $config_manip);*/
      $this->CI->load->library('image_lib',$config_manip);
      // Set your config up
      /*$this->CI->image_lib->initialize($config_manip);*/
      if (! $this->CI->image_lib->resize()) {
         echo $this->CI->image_lib->display_errors();
      }
      // Do your manipulation            
      $this->CI->image_lib->clear();
   }
   /* !- WORK!! -> Tidak Digunakan */

   public function update($id) {
      $post = $this->CI->input->post();

      $this->old_uniqid_gambar = $post['old_file'];
      $uniqid = explode('.', $post['old_file']);
      $this->uniqid_gambar = ($this->old_uniqid_gambar != 'default.jpg') ? $uniqid[0] : uniqid();
      $this->judul = $post['judul'];
      $this->isi = $post['editor1'];
      $gmbr = $this->_updateImage();
      $this->gambar = $this->_updateImage();
      return $this->CI->BeritaModel->updateData($id, $this);
   }

   private function _updateImage() {       
      // $old_uniqid_gambar = explode('.', $post['old_file']);
      if (!empty($_FILES['file']['name'])) {
         return $this->_uploadImage();         
      }      
      return $this->old_uniqid_gambar;
   }
   /* -------------------- SAVE BERITA -------------------- */

   public function save() {    
      $post = $this->CI->input->post();
      $this->uniqid_gambar = uniqid();
      $this->judul = $post['judul'];
      $this->isi = $post['editor1'];
      $this->gambar = $this->_uploadImage();
      $this->username = $this->CI->session->userdata('username');
            
      return $this->CI->BeritaModel->insertData($this);      
   }
   private function _uploadImage() {      
      $config['upload_path'] = $this->path;
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['file_name'] = $this->uniqid_gambar;
      //$config['encrypt_name'] = TRUE;
      $config['overwrite'] = true;
      $config['max_size'] = 5024;

      $this->CI->load->library('upload', $config);

      if ($this->CI->upload->do_upload('file')) {                  
         $gmbr = $this->CI->upload->data('file_name');
         $this->_create_thumbs($gmbr);
         return $gmbr;
      }
      else {
         $error = array('error' => $this->CI->upload->display_errors());                                         
         return 'default.jpg';
      }   
   }   
   /* -------------------- <!-- SAVE BERITA --> -------------------- */
    
   /* -------------------- DELETE BERITA -------------------- */  
   public function delete($id) {
      if ($this->_deleteImage($id)) {
         return $this->CI->BeritaModel->deleteData($id);         
      };            
      return false;
      
   }
   private function _deleteImage($id) {      
      $gmbr = $this->CI->BeritaModel->getById($id);
      //return ($gmbr->gambar != 'default.jpg') ? unlink('./upload/img-berita/'.$gmbr->gambar) : true ;
      /*if (unlink('./upload/img-berita/'.$gmbr->gambar)) {
         return true;
      }
      return false;*/           
      /*if (!isset($id)) show_404();*/
      if ($gmbr->gambar != 'default.jpg') {
         unlink('./upload/img-berita/'.$gmbr->gambar);
         unlink($this->path_thumbnail_small.$gmbr->gambar);
         unlink($this->path_thumbnail_medium.$gmbr->gambar);
         unlink($this->path_thumbnail_large.$gmbr->gambar);
      }
      return true;      
   }
   /* -------------------- <!-- DELETE BERITA --> -------------------- */
   function _create_thumbs($file_name){
      // Image resizing config
      $config = array(
         // Large Image
         array(
             'image_library' => 'GD2',
             'source_image'  => $this->path.$file_name,
             'maintain_ratio'=> FALSE,
             'width'         => 550,
             'height'        => 250,
             'new_image'     => $this->path_thumbnail_large.$file_name,
             'maintain_ratio'=> TRUE,
             'master_dim'    => 'height',
             'quality'       => '100%'
             ),
         // Medium Image
         array(
             'image_library' => 'GD2',
             'source_image'  => $this->path.$file_name,
             'maintain_ratio'=> FALSE,
             'width'         => 450,
             'height'        => 150,
             'new_image'     => $this->path_thumbnail_medium.$file_name,
             'maintain_ratio'=> TRUE,
             'master_dim'    => 'height',
             'quality'       => '100%'
             ),
         // Small Image
         array(
             'image_library' => 'GD2',
             'source_image'  => $this->path.$file_name,
             'maintain_ratio'=> FALSE,
             'width'         => 400,
             'height'        => 100,
             'new_image'     => $this->path_thumbnail_small.$file_name,
             'maintain_ratio'=> TRUE,
             'master_dim'    => 'height',
             'quality'       => '100%'
         ));

      $this->CI->load->library('image_lib', $config[0]);
   
      foreach ($config as $item){
         $this->CI->image_lib->initialize($item);
         if(!$this->CI->image_lib->resize()){
             return false;
         }
         $this->CI->image_lib->clear();
      }
   }
}
?>