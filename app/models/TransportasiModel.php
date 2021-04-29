<?php

class TransportasiModel {
	
	private $table = 'transportasi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllTransportasi()
	{
		$this->db->query("SELECT * from transportasi");
		return $this->db->resultSet();
	}

	public function getTransportasiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahTransportasi($data)
	{
		$query = "INSERT INTO transportasi (jenis_transportasi, nama_transportasi, tgl_keberangkatan, rute, jml_penumpang, titik_kumpul) VALUES(:jenis_transportasi, :nama_transportasi, :tgl_keberangkatan, :rute, :jml_penumpang, :titik_kumpul)";
		$this->db->query($query);
		$this->db->bind('jenis_transportasi', $data['jenis_transportasi']);
		$this->db->bind('nama_transportasi', $data['nama_transportasi']);
		$this->db->bind('tgl_keberangkatan', $data['tgl_keberangkatan']);
		$this->db->bind('rute', $data['rute']);
		$this->db->bind('jml_penumpang', $data['jml_penumpang']);
		$this->db->bind('titik_kumpul', $data['titik_kumpul']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDatTransportasi($data)
	{
		$query = "UPDATE transportasi SET jenis_transportasi=:jenis_transportasi, nama_transportasi=:nama_transportasi, tgl_keberangkatan=:tgl_keberangkatan, rute=:rute, jml_penumpang=:jml_penumpang, jml_penumpang=:jml_penumpang, titik_kumpul=:titik_kumpul WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('jenis_transportasi', $data['jenis_transportasi']);
		$this->db->bind('nama_transportasi', $data['nama_transportasi']);
		$this->db->bind('tgl_keberangkatan', $data['tgl_keberangkatan']);
		$this->db->bind('rute', $data['rute']);
		$this->db->bind('jml_penumpang', $data['jml_penumpang']);
		$this->db->bind('titik_kumpul', $data['titik_kumpul']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteTransportasi($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariTransportasi()
	{
		
	}
}