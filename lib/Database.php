<?php
	class Database{
		public $pdo; 
		private $dbHost = "localhost";
		private $dbName ="lr_pdo";
		private $dbUser ="root";
		private $dbPass ="";
		public function __construct(){
			if (!isset($this->pdo)) {
				try{
				$link = new PDO('mysql:dbhost='.$this->dbHost.';dbname='.$this->dbName,$this->dbUser,$this->dbPass);
				$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$link->exec('SET CHARACTER SET utf8');
				$this->pdo = $link;
				}catch(PDOException $e){
					die('Failed to connect Database...'.$e->getMessage());
				}
			}
		}


	}
?>