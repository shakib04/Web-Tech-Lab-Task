<?php include 'main_header.php';
require_once "../controllers/UserController.php"; ?>


<!--sign up starts -->
<div class="center-login">
	<h1 class="text text-center">Sign Up</h1>
	<form class="form-horizontal form-material" method="POST">
		<div class="form-group">
			<h4 class="text">Name</h4>
			<input type="text" name="fullname" class="form-control">
			<?php echo $err_fullname; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Username</h4>
			<input type="text" name="username" class="form-control">
			<?php echo $err_username; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Email</h4>
			<input type="text" name="email" class="form-control">
			<?php echo $err_email; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4>
			<input type="text" name="password" class="form-control">
			<?php echo $err_password; ?>
		</div>
		<div class="form-group text-center">
			<input type="submit" name="register" class="btn btn-success" value="Sign Up" class="form-control">
		</div>
</div>

<!--sign up ends -->
<?php include 'main_footer.php'; ?>