<?php

require 'Database.php';

class BlogController
{
	public string $header;
	public Database $db;

	public function __construct()
	{
		$this->header = 'Our Blog';
		$this->db = new Database();
	}

	public function index()
	{
		$posts = $this->db->all('blogs');

		$post = $this->db->findOne('blogs', 'id', '=', '1');

		require 'views/blogs/index.view.php';
	}

}

$blogController = new BlogController();
$posts = $blogController->index();

