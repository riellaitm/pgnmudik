<?php

class Rute extends Controller {
	// public function __construct()
	// {	
	// 	if($_SESSION['session_login'] != 'sudah_login') {
	// 		Flasher::setMessage('Login','Tidak ditemukan.','danger');
	// 		header('location: '. base_url . '/login');
	// 		exit;
	// 	}
	// } 
	public function index()
	{
		$data['title'] = 'Data Rute';
		$data['rute'] = $this->model('RuteModel')->getAllRute();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('rute/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{

	}

	public function edit($id)
	{
		$data['title'] = 'Detail Rute';
		$data['rute'] = $this->model('RuteModel')->getRuteById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('rute/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Rute';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('rute/create', $data);
		$this->view('templates/footer');
	}

	public function simpanRute()
	{		
		if( $this->model('RuteModel')->tambahRute($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/rute');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/rute');
			exit;	
		}
	}

	public function updatRute(){	
		if( $this->model('RuteModel')->updateDataRute($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/rute');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/rute');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('RuteModel')->deleteRute($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/rute');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/rute');
			exit;	
		}
	}
}