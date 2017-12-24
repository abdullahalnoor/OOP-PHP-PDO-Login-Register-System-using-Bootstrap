<?php
	 include_once 'inc/navbar.php';
	 Session::checkLogin();
	 
	include 'lib/User.php';
	$user = new User();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
		$userLogin	= $user->userLogin($_POST);
		//print_r($userLogin);

	}
?>

	
	<?php 
		if (isset($userLogin)) {
			echo $userLogin;
		}
	?>
	<div class="container main-body">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
					<div class="panel panel-default">
					<div class="panel-heading text-info">
						 User Login 
					</div>
					<div class="panel-body">

						<form class="" action="" method="post">
							<div class="form-group">
								<label c>Username</label>
								<input type="text" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label ></label>
								<input type="submit" name="login" class="btn btn-block btn-success">
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<?php include 'inc/footer.php'; ?>

	<!-- Script File -->
	<?php include"inc/_js.php"; ?>
</body>
</html>