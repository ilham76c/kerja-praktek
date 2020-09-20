<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BeritaObject {
	var $id;
	var $judul;
	var $isi;
	var $id_gambar;
	var $tanggal;

	function __construct($id, $judul, $isi, $id_gambar, $tanggal) {
		$this->id = $id;
		$this->judul = $judul;
		$this->isi = $isi;
		$this->id_gambar = $id_gambar;
		$this->tanggal = $tanggal;
	}
}
?>