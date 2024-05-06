<?php
$brand = new \Lib\Models\Brand();
$brands = $brand->all();
?>
<!-- banner -->
	<div class="banner">
		<div class="phone_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<?php $i = 0; foreach($brands as $brand):if ($i == 12) { break; } ?>
						<li><a href="pages/brand-items.php?id=<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></a></li>

		<?php $i++; endforeach; ?>
				</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="phone_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<a href=""><div class="phone_banner_nav_right_banner">
							</div></a>
						</li>
						<li>
							<a href=""><div class="phone_banner_nav_right_banner1">
							</div></a>
						</li>
						<li>
							<a href=""><div class="phone_banner_nav_right_banner2">
							</div></a>
						</li>
						<li>
							<a href=""><div class="phone_banner_nav_right_banner1">
							</div></a>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>