<?php
// start session
session_start();

// include classes
include_once "config/database.php";
include_once "objects/product.php";
include_once "objects/product_image.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// set the id as product id property
$product->id = $id;

// to read single record product
$product->readOne();

// set page title
$page_title = $product->name;

// include page header HTML
include_once 'layout_head.php';

// set product id
$product_image->product_id=$id;

// read all related product image
$stmt_product_image = $product_image->readByProductId();

// count all relatd product image
$num_product_image = $stmt_product_image->rowCount();


echo "<div class='col-md-4' id='product-img'>";

			$source=$product->Image_path;
			$show_product_img=$x==0 ? "display-block" : "display-none";

				echo "<img src='{$source}' style='width:100%;' />";
			echo "</a>";

echo "</div>";

echo "<div class='col-md-5'>";

	echo "<div class='product-detail'>Price:</div>";
	echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($product->price, 2, '.', ',') . "</h4>";

	echo "<div class='product-detail'>Product description:</div>";
	echo "<div class='m-b-10px'>";
		// make html
		$page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));

		// show to user
		echo $page_description;
	echo "</div>";

echo "</div>";

echo "<div class='col-md-2'>";

	// if product was already added in the cart
	if(array_key_exists($id, $_SESSION['cart'])){
		echo "<div class='m-b-10px'>This product is already in your cart.</div>";
		echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
			echo "Update Cart";
		echo "</a>";

	}

	// if product was not added to the cart yet
	else{

		echo "<form class='add-to-cart-form'>";
			// product id
			echo "<div class='product-id display-none'>{$id}</div>";

			echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
			echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";

			// enable add to cart button
			echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
				echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
			echo "</button>";

		echo "</form>";
	}
echo "</div>";

// include page footer HTML
include_once 'layout_foot.php';
?>
