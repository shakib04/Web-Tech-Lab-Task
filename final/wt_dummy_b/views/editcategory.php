<?php include 'admin_header.php';
require_once "../models/db-conn.php";

if (isset($_POST['edit-category'])) {
	$cname = $_POST['cname'];
	updateCategory($cname);
}

function updateCategory($cname)
{
	$sqlUpdateCategory = "UPDATE `categories` SET `name` = '$cname' WHERE `categories`.`c_id` =" . $_GET['c-id'] . ";";
	dbOperation($sqlUpdateCategory);
}

if (isset($_GET['c-id'])) {
	$id = $_GET['c-id'];
	$sql = "select * from categories where c_id =$id;";
	$categories = getValues($sql);
}


?>
<!--edit category starts -->
<div class="center">
	<form class="form-horizontal form-material" method="POST">
		<div class="form-group">
			<h4 class="text">Name:</h4>
			<input type="text" name="cname" value="<?php echo $categories[0]['name']; ?>" class="form-control">
		</div>

		<div class="form-group text-center">

			<input type="submit" name="edit-category" class="btn btn-success" value="Edit Category" class="form-control">
		</div>
	</form>
</div>

<!--edit category ends -->
<?php include 'admin_footer.php'; ?>