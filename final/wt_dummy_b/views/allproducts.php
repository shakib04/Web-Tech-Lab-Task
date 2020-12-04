<?php
include 'admin_header.php';

require_once "../controllers/ProductController.php";
$products = getAllProducts();


?>
<!--All Products starts -->

<div class="center">
	<h3 class="text">All Products</h3>
	<table class="table table-striped">
		<thead>
			<th>Sl#</th>
			<th> Name</th>
			<th>Category </th>
			<th> Price</th>
			<th> Quantity</th>
			<th> Image</th>
			<th></th>
			<th></th>
		</thead>
		<?php foreach ($products as $product) {
			echo "<tbody>";
			echo "<td>" . $product['p_id'] . "</td>";
			echo "<td>" . $product['name'] . "</td>";
			echo "<td>" . $product['catName'] . "</td>";
			echo "<td>" . $product['price'] . "</td>";
			echo "<td>" . $product['qunatity'] . "</td>";
			echo "<td><img height='40' width='40' src='" . $product['image'] . "'></td>";
			echo "<td><a href='editproduct.php?p-id=". $product['p_id'] . "' class='btn btn-success'>Edit</a></td>";
			echo "<td><a class='btn btn-danger'>Delete</td>";
			echo "</tbody>";
		}
		?>
	</table>
</div>
<!--Products ends -->
<?php include 'admin_footer.php'; ?>