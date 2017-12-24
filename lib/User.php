<?php
	include_once "lib/Session.php";
	include "lib/Database.php";
	class User{
		private $db;
		public function __construct(){
			$this->db = new Database();
		}
		public function userRegistration($data){
			$name	  = $data['name'];
			$name = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			$username = $data['username'];
			$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			$email	  =	$data['email'];
			$password = $data['password'];
			$check_email = $this->checkEmail($email);

			if (empty($name) || empty($username) || empty($email) || empty($password)) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be empty !!</div>";
				return $msg;
			}
			
			if (strlen($username) < 3) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Username is too short !!</div>";
				return $msg;
			}elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Username only contains alphanuemaric,Dashed,Undescrore  !!</div>";
				return $msg;
			}
			if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Invalid email !!</div>";
				return $msg;
			}
			if ($check_email == true) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong> Email already exist  !!</div>";
				return $msg;
			}
			$password = md5($data['password']);

			$sql = "INSERT INTO tbl_user (name,username,email,password) VALUES (:name,:username,:email,:password)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':name',$name);
			$query->bindValue(':username',$username);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$result = $query->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Success !</strong> You have registered Succesfully  !!</div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Something going wrong  !! Try agin Later.. </div>";
				return $msg;
			}

		}

		public function checkEmail($email){
			$sql 	= "SELECT email FROM tbl_user WHERE email= :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}

		public function getLoginUser($email,$password){
			$sql = "SELECT * FROM tbl_user WHERE email=:email AND password=:password ";
			$query =  $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		public function userLogin($data){
			$email = $data['email'];
			$password = md5($data['password']);

			if (empty($email) || empty($password)) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be empty...</div>";
				return $msg;

			}
			if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be empty...</div>";
				return $msg;
			}

			$result = $this->getLoginUser($email,$password);
			if ($result) {
				Session::init();
				Session::set('login',true);
				Session::set('id',$result->id);
				Session::set('name',$result->name);
				Session::set('username',$result->username);
				Session::set('email',$result->email);
				Session::set('loginmsg',"<div class='alert alert-success'><strong>Success</strong>You are login Succesfully !!</div>");
				header('Location:index.php');
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Data not found !!</div>";
				return $msg;
			}
		}


	}
?>