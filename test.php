<?php
	require 'lib/nusoap.php';
	
	$url = "http://localhost:9763/services/Shop?wsdl";
 
	$client = new nusoap_client($url, true);
	$error  = $client->getError();

	$proxy = $client->getProxyClassCode();
	print_r($proxy);
	 

	if ($error) {
	    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	}
	 
	
	//$result = $client->call('GetProductsList');
	//$productadd = $client->call('addToCart', array("productID" => $result['return']['0']['id']));
	//$cartItem = $client->call('cartItems');
	 $resutlCart = $client->call('getCartItems');
	
	if ($client->fault) {
	    echo "<h2>Fault</h2><pre>";
	    print_r($resutlCart);
	    echo "</pre>";
	} else {
	    $error = $client->getError();
	    if ($error) {
	        echo "<h2>Error</h2><pre>" . $error . "</pre>";
	    } else {
	        echo "<h2>Main</h2>";
	        echo $resutlCart['return']['1']['productName'];
	    }
	}
 
	// show soap request and response
	echo '<br />'.sizeof($resutlCart['return']).'<br />';
	echo "<h2>Request</h2>";
	echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
	echo "<h2>Response</h2>";
	echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
?>


