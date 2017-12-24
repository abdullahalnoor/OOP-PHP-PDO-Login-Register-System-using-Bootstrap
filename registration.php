	<?php
	 include_once 'inc/navbar.php';
	 Session::checkLogin();
	 include "lib/User.php";
	Session::checkLogin();
?>
<?php $user = new User();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userReg	= $user->userRegistration($_POST);
	}
?>

	
	<div class="container main-body">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading text-info">
						Registration Form
						<?php
							if (isset($userReg)) {
								echo $userReg;
							}
						?>
					</div>
					<div class="panel-body">
						<form action="" method="POST">
							<div class="form-group">
								<label>Your Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label> User Name</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label></label>
								<input type="submit" name="register" class="btn btn-success btn-block">
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