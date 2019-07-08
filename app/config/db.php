<?php
class Database
{
	private $host = "localhost";
	private $db = "test";
	private $user = "mysql";
	private $pass = "mysql";
	private $charset = "utf8";
	public $pdo;

	public function __construct()
	{
		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$opt = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		];
		$this->pdo = new PDO($dsn, $this->user, $this->pass, $opt);
	}
}