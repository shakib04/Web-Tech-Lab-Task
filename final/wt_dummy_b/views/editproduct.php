<?php include 'admin_header.php';
require_once "../models/db-conn.php";
require_once "../controllers/ProductController.php";
require_once "../controllers/CategoryController.php";

$categories = getAllCategories()

?>
<!--editproduct starts -->
<div class="center">
	<table class="show-present-data">
		<td>
			<img class="item-image" src="<?php echo $productData[0]['image'] ?>"></img>
		</td>
		<td>
			<form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<h4 class="text">Name:</h4>
					<input type="text" name="pname" value="<?php echo $productData[0]['name'] ?>" class="form-control">
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
					<input type="text" name="price" value="<?php echo $productData[0]['price'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<h4 class="text">Quantity:</h4>
					<input type="text" name="quantity" value="<?php echo $productData[0]['qunatity'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<h4 class="text">Description:</h4>
					<textarea type="text" name="description" class="form-control"><?php echo $productData[0]['description'] ?></textarea>
				</div>
				<div class="form-group">
					<h4 class="text">Image</h4>
					<input type="file" name="product-image" class="form-control">
				</div>
				<div class="form-group text-center">

					<input type="submit" name="update-product" class="btn btn-success" value="Edit Product" class="form-control">
				</div>
			</form>
		</td>
	</table>
</div>

<!--editproduct ends -->
<?php include 'admin_footer.php'; ?>