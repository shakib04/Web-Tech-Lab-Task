<?php include 'admin_header.php';
require_once "../controllers/DepartmentController.php";

?>
<!--edit department starts -->
<div class="center">
	<form class="form-horizontal form-material" method="POST">
		<div class="form-group">
			<h4 class="text">Name:</h4>
			<input type="text" name="dname" value="<?php echo $department[0]['name']; ?>" class="form-control">
		</div>
		<div class="form-group">
			<h4 class="text">ID:</h4>
			<input type="text" name="id" value="<?php echo $department[0]['id']; ?>" class="form-control">
		</div>

		<div class="form-group text-center">

			<input type="submit" name="edit-department" class="btn btn-success" value="Edit Department" class="form-control">
		</div>
	</form>
</div>

<!--edit department ends -->
<?php include 'admin_footer.php'; ?>