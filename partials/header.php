<!DOCTYPE html>
<html>
<head>
<title><?php echo _SITE_NAME; ?></title>
<link href="<?php echo home_url(); ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo home_url(); ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo home_url(); ?>/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo home_url(); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /> 
<script src="<?php echo home_url(); ?>/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/baez.js"></script>
    <script type="text/javascript" src="../js/Navies.js"></script>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo home_url(); ?>/js/move-top.js"></script>
</head>
	<body>
<!-- header -->
	<div class="shopping_header">
		<div class="container-header">
		<div class="phone_offers">
			<a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i>&nbsp; Home</a>
		</div>
		<div class="phone_search">
			<form action="<?php echo home_url();?>/partials/search.php" method="post">
				<input type="text" name="query" value="search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			<a href="<?php echo home_url(); ?>/?page=cart">view your cart</a>
		</div>
		<div class="phone_header_right">

      <?php if(!empty($_SESSION['_customer']['email'])) : ?>
      	<div class="login_users">
      	<?php echo $_SESSION['_customer']['full_name']; ?><br>
      	<i class="fa fa-user" aria-hidden="true"></i>
      	<a href="<?php echo home_url(); ?>/pages/logout.php">LogOut</a>
      </div>
      	<?php else: ?>
			<ul>
				
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="phones">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="<?php echo home_url(); ?>/pages/login.php">Login</a></li> 
								<li><a href="<?php echo home_url(); ?>/pages/signup.php">Sign Up</a></li>
							</ul>
						</div>                  
					</div>	
				</li>

			</ul>
			<?php endif; ?>
		</div>
		<div class="phone_header_right1">
			<h2><a href="<?php echo home_url(); ?>/pages/contact-us.php">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
	<div class="logo_products">
		<div class="container">
			<div class="phones_logo_products_left">
				<h1><a href="<?php echo home_url(); ?>"><span>Mobile</span> Shopping</a></h1>
			</div>
			<div class="phones_logo_products_left1">
				<ul class="special_items">
					<!---<li><a href="#">About Us</a><i>/</i></li>--->
					<li><a href="<?php echo home_url(); ?>/pages/brands.php">All Brands</a><i>/</i></li>
					<li><a href="<?php echo home_url(); ?>/pages/products.php">All Products</a><i>/</i></li>
					<li><a href="<?php echo home_url(); ?>/pages/findphone.php">Find Phone</a><i>/</i></li>

					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:brmpanthi@gmail.com">shopping@gmail.com</a></li>
				</ul>
			</div>
			<div class="phones_logo_products_left1">
				<ul class="phone_email">
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->