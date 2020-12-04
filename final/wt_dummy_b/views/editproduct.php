<?php include 'admin_header.php';
require_once "../models/db-conn.php";


if (isset($_POST['update-product'])) {
	$name = $_POST['pname'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];

	$productImage = $_FILES['product-image'];

	$tmpname = $productImage['tmp_name'];
	$targetDir = "images/product-image/";
	$fileTypeExtension = strtolower(pathinfo($productImage['name'], PATHINFO_EXTENSION));
	$filename = $_POST['pname'] . "-" . uniqid() . ".$fileTypeExtension";
	$targetFile = $targetDir . $filename;

	if (move_uploaded_file($tmpname, $targetFile)) {
		$status = "Uploaded !!";
		updateProduct($name, $category, $price, $quantity, $description, $targetFile);
		//$validCount++;
	} else {
		$status = "Failed to Upload";
	}
}

function updateProduct($name, $category, $price, $quantity, $description, $imgAddress)
{
	$sqlUpdateProduct = "UPDATE `products` SET `name` = '$name', `category` = '$category', `price` = '$price', `qunatity` = '$quantity', `description` = '$description', `image` = '$imgAddress' WHERE `products`.`p_id` =" . $_GET['p-id'] . ";";
	dbOperation($sqlUpdateProduct);
	//header("location:allproducts.php");
}

$sqlCategories = "SELECT * FROM `categories` order by name;";

$categories = getValues($sqlCategories);


if (isset($_GET['p-id'])) {
	$sqlgetDatafromId = "SELECT p.*,c.name catName FROM products p, categories c WHERE p.category = c.c_id and p_id =" . $_GET['p-id'] . ";";
	$productData = getValues($sqlgetDatafromId);
}


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