<?php
	// Include the Twilio PHP library
	require 'twilio-php-master/Services/Twilio.php';

	// Twilio REST API version
	$version = "2010-04-01";

	// Set our Account SID and AuthToken
	$sid = 'AC92d7d0008cc636332f1de39de20d7710';
	$token = 'b92838f15950f9935191b438ea18a33e';
	
	// A phone number you have previously validated with Twilio

	// on the profile page 
		//create a call link
		//call link inserts the students phone number and forwards to call request
	//make a get that  gets the phone number 


	$phonenumber 		= '34518888577';
	$receiving_number 	= $_GET['phone'];
	
	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($sid, $token, $version);

	try {
		// Initiate a new outbound call
		$call = $client->account->calls->create(
			$phonenumber, // The number of the phone initiating the call
			//'34605205378', // The number of the phone receiving call
			$receiving_number, // The number of the phone receiving call
			'http://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
		);
		echo 'Started call: ' . $call->sid;
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
