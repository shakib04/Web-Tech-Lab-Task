<?php include 'admin_header.php';

require_once "../controllers/StudentController.php";
require_once "../controllers/DepartmentController.php";

$department = getAllDepartments();

?>

<style>
	.input-border-red {
		border: 2px solid red;
	}
</style>
<!--addstudent starts -->
<div class="center">
	<form class="form-horizontal form-material" onsubmit="return studentValidation()" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<h4 class="text">Name:</h4>
			<input type="text" name="sname" id="sname" class="form-control"> <span id="err_name"></span>
			<?php echo $err_name; ?>
		</div>
		<div class="form-group">
			<h4 class="text">department:</h4>
			<select class="form-control" id="department" name="department">
				<option selected value="-1">Choose</option>
				<?php
				foreach ($department as $singleDepartment) {
					echo "<option value='" . $singleDepartment['id'] . "'>" . $singleDepartment['name'] . "</option>";
				}
				?>
			</select>
			<span id="err_dept"></span>
		</div>
		<div class="form-group">
			<h4 class="text">CGPA:</h4>
			<input type="text" name="cgpa" id="cgpa" class="form-control"><span id="err_cgpa"></span>
			<?php echo $err_cgpa; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Credit:</h4>
			<input type="text" name="credit" id="credit" class="form-control"><span id="err_credit"></span>
			<?php echo $err_credit; ?>
		</div>
		<div class="form-group">
			<h4 class="text">DOB:</h4>
			<input type="text" name="dob" id="dob" class="form-control"><span id="err_dob"></span>
			<?php echo $err_dob; ?>
		</div>
		<div class="form-group text-center">

			<input type="submit" name="add-student" class="btn btn-success" value="Add Student" class="form-control">
			<?php echo $status; ?>
		</div>
	</form>

	<script src="js/student-validation.js"></script>
</div>
<?php include 'admin_footer.php'; ?>