<?php

class Post
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAll() 
	{
		$this->db->query('select * from ingredients');
		$result = $this->db->resultSet();

		return $result;
	}
}