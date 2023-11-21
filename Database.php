<?php

class Database {
	public $connection;

	public function __construct($username = 'root', $password = 'admin@2564') {
		try {
			$this->connection = new PDO('mysql:host=localhost;dbname=blog', $username, $password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public function all($table = null): array {
		try {
			$statement = $this->connection->prepare("SELECT * FROM {$table}");
			$statement->execute();
			return $statement->fetchAll();
		} catch (PDOException $e) {
			echo "Query failed: " . $e->getMessage();
			return [];
		}
	}

	public function findOne(string $table, string $column, string $operator, int | string $value): array {
		try {
			$statement = $this->connection->prepare("SELECT * FROM {$table} WHERE {$column} {$operator} :value");
			$statement->bindParam(':value', $value);
			$statement->execute();
			return $statement->fetch();
		} catch (PDOException $e) {
			echo "Query failed: " . $e->getMessage();
			return [];
		}
	}

	public function insert(string $table, $columns) {
		try {
			$column = implode(', ', array_keys($columns));
			$value = "'" . implode("', '", array_values($columns)) . "'";
			$statement = $this->connection->prepare("INSERT INTO {$table} ($column) VALUES ($value)");
			$statement->execute();
		} catch (PDOException $e) {
			echo "Insert failed: " . $e->getMessage();
		}
	}
}