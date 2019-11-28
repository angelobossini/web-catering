<!-- navbar -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="container-fluid">
		<a href="#" class="navbar-brand mr-3">SDA Catering</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
				<div class="navbar-nav">
						<a href="index.html" class="nav-item nav-link active">Home</a>
						<a href="products.php" class="nav-item nav-link">Products</a>
						<a href="contact.php" class="nav-item nav-link">Contact</a>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

<ul class="nav navbar navbar-expand-md navbar-dark bg-dark ml-auto">
	<li <?php session_start();
	echo $page_title=="Cart" ? "class='active'" : ""; ?> >
		<a href="cart.php">
			<?php
			// count products in cart
			$cart_count=count($_SESSION['cart']);
			?>
			Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
		</a>
	</li>
	<li class="nav-item dropdown">
		<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#" style="color: grey;"><i class="fa fa-user-o" ></i> Login</a>
		<ul class="dropdown-menu">

			<li>
										<form class="form-inline login-form" action="login.php" method="POST">
												<div class="input-group">
														<input type="text" class="form-control" name="username" style="width: 90%; margin-left:5%; margin-right:5%;" placeholder="Username" required>
												</div>
												<div class="input-group" >
														<input type="password" class="form-control" name="psw" style="width: 90%; margin-left:5%; margin-top:5%; margin-right:5%;" placeholder="Password" required>
												</div>
												<button type="submit" class="btn bg-dark btn-primary" style="margin-left:10px; margin-top: 10px; margin-right: 10px;">Login</button>

										</form>
			</li>


		</ul>

	</li>

	 <!-- <li class="nav-item">
	<a href="register.php" style="color: grey;"><i class="fa fa-user-o"></i> Register</a>
</li> -->
</ul>
</div>
		</div>
</div>
<!-- /navbar -->
