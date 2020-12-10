<?php include 'admin_header.php';
require_once "../controllers/DepartmentController.php";


?>
<!--addproduct starts -->
<div class="center">
	<form class="form-horizontal form-material" method="POST">
		<div class="form-group">
			<h4 class="text">Name:</h4>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<h4 class="text">ID:</h4>
			<input type="text" name="id" class="form-control">
		</div>

		<div class="form-group text-center">

			<input type="submit" name="add-department" class="btn btn-success" value="Add Department" class="form-control">
		</div>
	</form>
</div>

<!--addproduct ends -->
<?php include 'admin_footer.php'; ?>