<?php
	require 'lib/nusoap.php';
	
	$url = "http://172.28.12.140:9763/services/Supplier?wsdl";
 
	$client = new nusoap_client($url, true);
	$error  = $client->getError();
	 

	if ($error) {
	    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	}
?>

<!DOCTYPE HTML>
<head>
<title>MobiShop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
<script src="js/jquery.openCarousel.js" type="text/javascript"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript">
	function addToCart() {
    	document.getElementById("addedItems").textContent = parseInt(document.getElementById("addedItems").textContent) + 1;
	}
</script>
</head>
<body style="zoom: 1;">
	<div class="header">
  		<div class="wrap">
			<div class="header_top">
				<div class="logo">
					<a href="index.html"></a>
				</div>
					
		     <div class="clear"></div>
		    </div>     
		    <div class="navigation">
		    	<a class="toggleMenu" href="#" style="display: none;">Menu</a>
				<ul class="nav">
					<li class="">
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="contact.html">Cart <span id="addedItems" class="badge"><?php $cartItem = $client->call('cartItems'); echo $cartItem['return'];?></span></a>
					</li>
				</ul>
				 <span class="left-ribbon"> </span> 
					 <span class="right-ribbon"> </span>    
		    </div>
  		</div>
   </div>
   <!------------End Header ------------>
  	<div class="main">
      	<div class="content">
    	    <div class="content_bottom">
    	    	<div class="wrap">
    	    		<div class="content-bottom-right">
    	    			<h3>Available Products</h3>
	            		<div class="section group">
	            			<?php
	            			$result = $client->call('GetProductsList');
	            			for($i = 0; $i <= 3; $i++) {
								echo '<div class="grid_1_of_4 images_1_of_4">
									<h4><a href="preview.html">'.$result['return'][$i]['productName'].'</a></h4>
									<a href="preview.html"><img src="images/'.$result['return'][$i]['img'].'" alt=""></a>
									<div class="price-details">
								       	<div class="price-number">
											<p><span class="rupees">$'.$result['return'][$i]['price'].'</span></p>
									    </div>
							       		<div class="add-cart">								
											<h4><a onclick="addToCart()">Add to Cart</a></h4>
									    </div>
									 	<div class="clear"></div>
									</div>					 
								</div>';
							}
							?>
							
			    		</div>
		      		</div>
		      		<div class="clear"></div>
		   		</div>
         	</div>
      	</div>
    </div>
   	<div class="footer">
   	  	<div class="wrap">	
		 	<div class="copy_right">
				<p>Copy rights (c). All rights Reseverd</p>
		   </div>	
		</div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: none;"><span id="toTopHover"></span> </a>
    <script type="text/javascript" src="js/navigation.js"></script>
	<a href="#" id="toTop">To Top</a></body>
</html>