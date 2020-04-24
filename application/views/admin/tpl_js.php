<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>	    
<script type="text/javascript">	
	$(document).ready(function () {	
		// navigasi
		$(window).scroll(function() {
			if($(this).scrollTop()>50) {
				$( ".navbar" ).addClass("navbar-fixed-top");
				$( ".content-wrapper" ).addClass("container-fix");
			} else {
				$( ".navbar" ).removeClass("navbar-fixed-top");
				$( ".content-wrapper" ).removeClass("container-fix");
			}
		});
		
		// live clock
		$(".fclock").clock({"langSet":"id","format":"12"});
	});
</script>