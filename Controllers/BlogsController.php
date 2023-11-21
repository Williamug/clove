<?php

require 'Database.php';

class BlogController {
	public string $header;
	public Database $db;

	public function __construct() {
		$this->header = 'Our Blog';
		$this->db = new Database();
	}

	public function index() {
		$posts = $this->db->all('blogs');
		require 'views/blogs/index.view.php';
	}

	public function show() {
		$post = $this->db->findOne('blogs', 'title', '=', 'title 3');

		require 'views/blogs/show.view.php';
	}

	public function create() {
		$insert = $this->db->insert('blogs', [
			'title' => 'Some tile',
			'body' => 'some body here',
		]);

		require 'views/blogs/create.view.php';
	}
}

$blogController = new BlogController();
$posts = $blogController->index();
$post = $blogController->show();
$posts = $blogController->create();
