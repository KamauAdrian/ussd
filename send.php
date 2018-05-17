<?php
require_once('AfricasTalkingGateway.php');
// Specify your authentication credentials
$username   = "Adrian6202";
$apikey     = "3721132f020da7e3f9011d8a5dc40a78bce59e1db770c9f18f0f2a358c1eac39";

$recipients = "+254797938403";
$message    = "Welcome home";
$gateway    = new AfricasTalkingGateway($username, $apikey);

try
{
    // Thats it, hit send and we'll take care of the rest.
    $results = $gateway->sendMessage($recipients, $message);

//    foreach($results as $result) {
//        // status is either "Success" or "error message"
//        echo " Number: " .$result->number;
//        echo " Status: " .$result->status;
//        echo " MessageId: " .$result->messageId;
//        echo " Cost: "   .$result->cost."\n";
//    }
}
catch ( AfricasTalkingGatewayException $e )
{
//    echo "Encountered an error while sending: ".$e->getMessage();
}
// DONE!!!