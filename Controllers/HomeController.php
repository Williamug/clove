<?php

require 'Database.php';

class HomeController
{
	public string $header;
	public Database $db;

	public function __construct()
	{
		$this->header = 'Home';
		$this->db = new Database();
	}


	public function index()
	{
		$posts = $this->db->all('blogs');
		require 'views/home/index.view.php';
	}

}

$homeController = new HomeController();
$posts = $homeController->index();

