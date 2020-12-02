<?php include 'admin_header.php';

require_once "../models/db-conn.php";

$sqlCategories = "SELECT * FROM `categories` order by name;";

$categories = getValues($sqlCategories);


$status = "";
$validCount = 0;
if (isset($_POST['add-product'])) {
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
		$validCount++;
	} else {
		$status = "Failed to Upload";
	}


	if ($validCount == 1) {
		addProduct($name, $category, $price, $quantity, $description, $targetFile);
	}
}

function addProduct($name, $category, $price, $quantity, $description, $imgAddress)
{
	$sqlAddProduct = "INSERT INTO `products` (`p_id`, `name`, `category`, `price`, `qunatity`, `description`, `image`) VALUES (NULL, '$name', '$category', '$price', '$quantity', '$description', '$imgAddress');";
	operation($sqlAddProduct);
}


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