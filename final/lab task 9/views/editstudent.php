<?php include 'admin_header.php';
require_once "../models/db-conn.php";
require_once "../controllers/StudentController.php";
require_once "../controllers/DepartmentController.php";

$departments = getAllDepartments()

?>
<!--editstudent starts -->
<div class="center">
	<table class="show-present-data">
		<td>

		</td>
		<td>
			<form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<h4 class="text">Name:</h4>
					<input type="text" name="sname" value="<?php echo $studentData[0]['name'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<h4 class="text">department:</h4>
					<select class="form-control" name="department">
						<!-- <option selected disabled>Choose</option> -->
						<?php
						foreach ($departments as $singledepartment) {
							echo "<option value='" . $singledepartment['id'] . "'>" . $singledepartment['name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<h4 class="text">CGPA:</h4>
					<input type="text" name="cgpa" value="<?php echo $studentData[0]['cgpa'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<h4 class="text">credit:</h4>
					<input type="text" name="credit" value="<?php echo $studentData[0]['credit'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<h4 class="text">dob:</h4>
					<input type="text" name="dob" class="form-control" value="<?php echo $studentData[0]['dob'] ?>">
				</div>
				<div class="form-group text-center">

					<input type="submit" name="update-student" class="btn btn-success" value="Edit Student" class="form-control">
				</div>
			</form>
		</td>
	</table>
</div>

<!--editstudent ends -->
<?php include 'admin_footer.php'; ?>