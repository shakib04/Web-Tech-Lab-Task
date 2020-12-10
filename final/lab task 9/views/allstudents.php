<?php
include 'admin_header.php';

require_once "../controllers/StudentController.php";
$students = getAllStudents();


?>
<!--All Students starts -->

<div class="center">
	<h3 class="text">All Students</h3>
	<table class="table table-striped">
		<thead>
			<th>Id#</th>
			<th> Name</th>
			<th>Dept. </th>
			<th> Credit</th>
			<th> CGPA</th>
			<th>DOB</th>
			<th></th>
			<th></th>
		</thead>
		<?php foreach ($students as $student) {
			echo "<tbody>";
			echo "<td>" . $student['id'] . "</td>";
			echo "<td>" . $student['name'] . "</td>";
			echo "<td>" . $student['deptName'] . "</td>";
			echo "<td>" . $student['credit'] . "</td>";
			echo "<td>" . $student['cgpa'] . "</td>";
			echo "<td>" . $student['dob'] . "</td>";
			//echo "<td><img height='40' width='40' src='" . $student['image'] . "'></td>";
			echo "<td><a href='editstudent.php?s-id=" . $student['id'] . "' class='btn btn-success'>Edit</a></td>";
			echo "<td><a href='?s-id=" . $student['id'] . "&delete=ok' class='btn btn-danger'>Delete</td>";
			echo "</tbody>";
		}
		?>
	</table>
</div>
<!--Students ends -->
<?php include 'admin_footer.php'; ?>