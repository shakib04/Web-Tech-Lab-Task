<?php include 'main_header.php';
require_once "../controllers/UserController.php"; ?>

<!--login starts -->
<div class="center-login">
	<h1 class="text text-center">Login</h1>
	<form method="POST" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Username</h4>
			<input type="text" name="username" class="form-control">
			<?php echo $err_username; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4>
			<input type="text" name="password" class="form-control">
			<?php echo $err_password; ?>
		</div>
		<div class="form-group text-center">

			<input type="submit" class="btn btn-danger" name="login" value="Login" class="form-control">
		</div>
		<div class="form-group text-center">

			<a href="signup.php">Not registered yet? Sign Up</a>
		</div>
</div>

<!--login ends -->
<?php include 'main_footer.php'; ?>