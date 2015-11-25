<?php
	require 'lib/nusoap.php';
	
	$url = "http://172.28.12.140:9763/services/Supplier?wsdl";
 
	$client = new nusoap_client($url, true);
	$error  = $client->getError();

	$proxy = $client->getProxyClassCode();
	print_r($proxy);
	 

	if ($error) {
	    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	}
	 
	
	$result = $client->call('GetProductsList');
	 
	
	if ($client->fault) {
	    echo "<h2>Fault</h2><pre>";
	    print_r($result);
	    echo "</pre>";
	} else {
	    $error = $client->getError();
	    if ($error) {
	        echo "<h2>Error</h2><pre>" . $error . "</pre>";
	    } else {
	        echo "<h2>Main</h2>";
	        echo $result['return']['0']['price'];
	    }
	}
 
	// show soap request and response
	echo "<h2>Request</h2>";
	echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
	echo "<h2>Response</h2>";
	echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
?>


