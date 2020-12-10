<?php
include 'admin_header.php';
require_once "../controllers/DepartmentController.php";

$departments = getAllDepartments();

//SELECT  c.c_id,c.name, COUNT(p.department) FROM categories c, products p WHERE c.c_id = p.department GROUP  BY c.name;

?>
<!--All Departments starts -->

<div class="center">
	<h3 class="text">All Departments</h3>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th> Name</th>
			<th></th>
			<th></th>

		</thead>
		<?php ?>
		<?php
		foreach ($departments as $department) {

			echo "<tbody>";
			echo "<td>" . $department['id'] . "</td>";
			echo "<td>" . $department['name'] . "</td>";
			echo '<td><a href="editdepartment.php?d-id=' . $department['id'] . '"class="btn btn-success">Edit</a></td>';
			echo "<td><a href='?d-id=" . $department['id'] . "&delete=ok' class='btn btn-danger'>Delete</td>";
			echo "</tbody>";
		}
		?>
	</table>
</div>
<!--All Departments ends -->
<?php include 'admin_footer.php'; ?>