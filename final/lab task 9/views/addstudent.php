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

			<select class="form-control" name="year-dob" id="year-dob">
				<option value="-1" selected disabled>Year</option>
				<option value="1996">1996</option>
				<option value="1997">1997</option>
				<option value="1998">1998</option>
			</select>
			<span id="err_dob_year"></span>

			<?php echo $err_dob_year; ?>
			<select class="form-control" name="month-dob" id="month-dob">
				<option value="-1" selected disabled>month</option>
				<?php
				for ($i = 1; $i <= 12; $i++) {
					echo "<option value='$i'>$i</option>";
				}
				?>
			</select>
			<span id="err_dob_month"></span>
			<?php echo $err_dob_month; ?>
			<select class="form-control" name="date-dob" id="date-dob">
				<option value="-1" selected disabled>date</option>
				<?php
				for ($i = 1; $i <= 31; $i++) {
					echo "<option value='$i'>$i</option>";
				}
				?>
			</select>
			<span id="err_dob_date"></span>
			<?php echo $err_dob_date; ?>

		</div>
		<div class="form-group text-center">

			<input type="submit" name="add-student" class="btn btn-success" value="Add Student" class="form-control">
			<?php echo $status; ?>
		</div>
	</form>

	<script src="js/student-validation.js"></script>
</div>
<?php include 'admin_footer.php'; ?>