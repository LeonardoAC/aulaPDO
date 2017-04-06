<?php
/*
	Class Conectar.class.php
	By Leonardo Alves Carrilho
	25/11/2016
 */
class Conectar extends PDO{

	private static $instance;
	private $query;
	private $host 	= "localhost";
	private $user 	= "root";
	private $passw 	= "leo123";
	private $db		= "cursopdo";

	public function __construct(){
		parent::__construct("mysql:host=$this->host;dbname=$this->db", "$this->user", "$this->passw");
	}

	public static function getInstance(){
		// Cria a instancia, caso não exista
		if (!isset(self::$instance)){
			try {
				self::$instance = new Conectar;
			} catch (Exception $e) {
				echo 'Erro ao conectar';
				exit();
			}
		} // if
		// Se existir instance na memória, retorna-a
		return self::$instance;
	} // getInstance

	public function sql($query){
		$this->getInstance();
		$this->query = $query;
		$stmt = $pdo->prepare($this->query);
		$stmt->execute();
		$pdo = null;
	} // sql


} // class
?>