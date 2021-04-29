<?php

class RuteModel {
	
	private $table = 'rute';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllRute()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getRuteById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahRute($data)
	{
		$query = "INSERT INTO rute (nama_rute) VALUES(:nama_rute)";
		$this->db->query($query);
		$this->db->bind('nama_rute',$data['nama_rute']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataRute($data)
	{
		$query = "UPDATE rute SET nama_rute=:nama_rute WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama_rute',$data['nama_rute']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteRute($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariRute()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_rute LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}