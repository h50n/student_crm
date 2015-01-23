<?php
	// Include the Twilio PHP library
	require 'twilio-php-master/Services/Twilio.php';

	// Twilio REST API version
	$version = '2010-04-01';

	// Set our AccountSid and AuthToken
	$sid = 'AC92d7d0008cc636332f1de39de20d7710';
	$token = 'b92838f15950f9935191b438ea18a33e';

	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($sid, $token, $version);

	try {
		// Get Recent Calls
		foreach ($client->account->calls as $call) {
			echo "Call from $call->from to $call->to at $call->start_time of length $call->duration</br></br>";
		}
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
