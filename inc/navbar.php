
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/Session.php';
	Session::init();
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login and Registration</title>
	 <?php include'inc/_css.php'; ?>
</head>
<body>
	<!-- header -->
<nav class="navbar navbar-default">
		<div class="container">
			 <div class="navbar-header">
			 	<a href="index.php" class="navbar-brand">Login Registration in PDO</a>
			 </div>
			 <ul class="nav navbar-nav navbar-right">
			 <?php
				//$id =  Session::get('id');
				//$userLogin =  Session::get('true');
			  if(empty(Session::get('id'))){ ?>
			 		<li><a href="login.php">Login</a></li>
			 		<li><a href="registration.php">Registrtion</a></li>
			 	<?php }else{ ?>
			 		<li><a href="index.php">Profile</a></li>
			 		<li><a href="?action=logout">Log out</a></li>
			 	<?php }?>
			 	
			 </ul>
		</div>	 
	</nav>