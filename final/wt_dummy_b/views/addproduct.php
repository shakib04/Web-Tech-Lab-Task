<?php include 'admin_header.php';

require_once "../controllers/ProductController.php";
require_once "../controllers/CategoryController.php";

$categories = getAllCategories();

?>
<!--addproduct starts -->
<div class="center">
	<form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<h4 class="text">Name:</h4>
			<input type="text" name="pname" value="k20 pro" class="form-control">
		</div>
		<div class="form-group">
			<h4 class="text">Category:</h4>
			<select class="form-control" name="category">
				<option selected disabled>Choose</option>
				<?php
				foreach ($categories as $singleCategory) {
					echo "<option value='" . $singleCategory['c_id'] . "'>" . $singleCategory['name'] . "</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<h4 class="text">Price:</h4>
			<input type="text" name="price" class="form-control">
		</div>
		<div class="form-group">
			<h4 class="text">Quantity:</h4>
			<input type="text" name="quantity" class="form-control">
		</div>
		<div class="form-group">
			<h4 class="text">Description:</h4>
			<textarea type="text" name="description" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<h4 class="text">Image</h4>
			<input type="file" name="product-image" class="form-control">
		</div>
		<div class="form-group text-center">

			<input type="submit" name="add-product" class="btn btn-success" value="Add Product" class="form-control">
			<?php echo $status; ?>
		</div>
	</form>

</div>
<?php include 'admin_footer.php'; ?>