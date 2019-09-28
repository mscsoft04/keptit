<?php

if(isset($_REQUEST['owner']) == true)
{

    // get cURL resource
    $ch = curl_init();

// set url
    curl_setopt($ch, CURLOPT_URL, 'https://api.ytel.com/api/v3/calls/makecall.json');

// set method
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

// return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// set headers 4649ffda-f862-4da3-9341-a3db696a08a1:0a0a6f60985c11e98bd183a5a4d477f9
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic 4649ffda-f862-4da3-9341-a3db696a08a1:0a0a6f60985c11e98bd183a5a4d477f9',
        'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    ]);

// form body
    $body = [
        'from' => '+18882217171',
       // 'to' => $_REQUEST['owner'],
		'to' => '+19994880917',
        'url' => 'https://customapps.message360.com/operations/brian/keptit.php?firstleg=' . $_REQUEST['+18807970555'],
        'method' => 'POST',
    ];
    $body = http_build_query($body);

// set body
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

// send the request and save response to $response
    $response = curl_exec($ch);

// stop if fails
    if (!$response) {
        die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
    }

    echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
    echo 'Response Body: ' . $response . PHP_EOL;

// close curl resource to free up system resources
    curl_close($ch);

}



//This is the portion of the page that loads once someone answers on the initial call
//$firstleg variable is the person that will be called for the appointment
//$To is the person being called to press 1
if(isset($_REQUEST['firstleg']) == true)
{
echo "<Response>";
echo "<say voice=\"en-us-premium-female-3\" type=\"ssml\">Hi<break time=\"0.15s\"/>No idea what I am supposed to say here.<break time=\"0.15s\"/>But I guess you have an appointment with someone you need to call.</say>";
echo "<Gather timeout=\"10\" action=\"https://customapps.message360.com/operations/brian/keptit.php?secondleg=" .$_REQUEST['firstleg'] . "&callerid=" .$_REQUEST['To'] . "\" method=\"POST\" numDigits=\"1\">";
echo "<say voice=\"en-us-premium-female-3\" type=\"ssml\" loop=\"5\">Press 0 to make the call now.<break time=\"0.15s\"/>If you would like to cancel the call<break time=\"0.1s\"/>Please just hang up.</say>";
echo "</Gather>";
echo "<hangup/>";
echo "</Response>";

}


//This is the portion of the page that loads once someone presses or doesnt press a digit from the gather tag
//$secondleg variable is the person that will be called for the appointment
//$callerid is the self explanatory
if(isset($_REQUEST['secondleg']) == true)
{
    if($_REQUEST['Digits'] == 0)
    {
        echo "<Response>";
        echo "<say voice=\"en-us-premium-female-3\" type=\"ssml\">Please hold while I call the number.</say>";
        echo "<Dial timeout=\"120\" callerID=\"+1" . substr($_REQUEST['callerid'],-10) . "\">+1" . substr($_REQUEST['secondleg'],-10) . "</Dial>";
        echo "</Response>";
    }
    else
    {
        echo "<Response>";
        echo "<say voice=\"en-us-premium-female-3\" type=\"ssml\">I did not receive a press 0.<break time=\"0.25s\"/>Good bye.</say>";
        echo "<hangup/>";
        echo "</Response>";
    }



}