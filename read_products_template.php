<?php
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=array();
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	extract($row);

	// creating box
	echo "<div class='col-md-4 m-b-20px'>";




		echo "<a href='product.php?id={$id}' class='product-link'>";
			// select and show first product image
			$product_image->product_id=$id;
			$stmt_product_image=$product_image->readFirst();

			while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
				echo "<div class='m-b-10px'>";

				echo "</div>";
			}

			// product name
			echo "<img src='{$Image_path}' width='300px' height='190px' />";
			echo "<h4>{$name}</h4>";
			echo "</a>";
			echo "<h6 >&#36;" . number_format($price, 2, '.', ',') . "</h6>";


		// add to cart button
		echo "<div class='m-b-10px'>";
			if(array_key_exists($id, $_SESSION['cart'])){
				echo "<a href='cart.php' class='btn btn-primary bg-dark'>";
					echo "Update Cart";
				echo "</a>";
			}else{
				echo "<a href='add_to_cart.php?id={$id}&page={$page}' class='btn btn-primary bg-dark'>Add to Cart</a>";
			}
		echo "</div><br /><br />";

	echo "</div>";
}

include_once "paging.php";
?>
