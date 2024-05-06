<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer_copy">
				<p>© <?php echo date('Y'); ?> Online Smart Mobile Shopping. All rights reserved </p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo home_url(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo home_url(); ?>/js/common.js"></script>
<script src="<?php echo home_url(); ?>/js/baez.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
</body>
</html>
