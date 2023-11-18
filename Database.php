<?php

class Database {
	public $connection;

	public function __construct($username = 'root', $password = 'admin@2564') {

		try {
			$this->connection = new PDO('mysql:host=localhost;dbname=blog', $username, $password);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function all($table = null): array {
		$statement = $this->connection->prepare("SELECT * FROM {$table}");

		if (!is_null($statement)) {
			$statement->execute();
			return $results = $statement->fetchAll();
		}
	}

	public function findOne(string $table, string $column, string $operator, int | string $value): array {
		$statement = $this->connection->prepare("SELECT * FROM {$table} WHERE {$column} {$operator} '{$value}'");

		if (!is_null($statement)) {
			$statement->execute();
			return $result = $statement->fetch();
		}
	}
}