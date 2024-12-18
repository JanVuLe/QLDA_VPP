<?php

	echo"<div id='wrapper'>";
	echo"	<div id=\"bigPicWrapper\">";
	echo"		<div id=\"bigPic\">";
	echo"			<img src=\"img-logo-background/vp1.jpg\" alt=\"\" style=\"width: 740px;\"/>";
	echo"			<img src=\"img-logo-background/vp2.jpg\" alt=\"\" style=\"width: 740px;\"/>";
	echo"			<img src=\"img-logo-background/vp3.jpg\" alt=\"\" style=\"width: 740px;\"/>";
	echo"			<img src=\"img-logo-background/vp4.jpg\" alt=\"\" style=\"width: 740px;\"/>";
	echo"			<img src=\"img-logo-background/vp5.jpg\" alt=\"\" style=\"width: 740px;\"/>";
	echo"			<img src=\"img-logo-background/vp6.jpg\" alt=\"\" style=\"width: 740px;\"/>";
		echo"	</div>";
	echo"	</div>";
echo"	</div>";

	

	echo"<script type=\"text/javascript\">";
	echo"	$(document).ready(function(){";
	echo"		$('#bigPicWrapper').slick({";
	echo"			slidesToShow: 1,";
	echo"			slidesToScroll: 1,";
	echo"			autoplay: true,";
	echo"			autoplaySpeed: 2000,";
	echo"		});";
	echo"	});";

	
	echo"</script>";	
?>	
