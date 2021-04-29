<?php

class Transportasi extends Controller {
	
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
		$data['title'] = 'Data Transportasi';
		$data['transportasi'] = $this->model('TransportasiModel')->getAllTransportasi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transportasi/index', $data);
		$this->view('templates/footer');
	}

	public function cari()
	{
		$data['title'] = 'Data transportasi';
		$data['transportasi'] = $this->model('TransportasiModel')->cariTransportasi();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transportasi/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Transportasi';
		$data['transportasi'] = $this->model('TransportasiModel')->getAllTransportasi();
		$data['rute'] = $this->model('RuteModel')->getRuteById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transportasi/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah transportasi';		
		$data['rute'] = $this->model('RuteModel')->getAllRute();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('trasnportasi/create', $data);
		$this->view('templates/footer');
	}

	public function simpantransportasi(){		

		if( $this->model('TransportasiModel')->tambahTransportasi($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/transportasi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/transportasi');
			exit;	
		}
	}

	public function updateTransportasi(){	
		if( $this->model('TransportasiModel')->updateDataTransportasi($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/transportasi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/transportasi');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('TransportasiModel')->deleteTransportasi($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/transportasi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/transportasi');
			exit;	
		}
	}
}