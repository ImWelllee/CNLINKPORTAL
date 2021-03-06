<?php
    require 'vendor/autoload.php';
    use Plivo\RestAPI;
    $auth_id = "MANWVIMMRHYJFLNWRMOW";
    $auth_token = "MDYwM2U0Yzk3ZWRiYmU2NTEyY2MxNGZlZDkzM2Vi";

    $p = new RestAPI($auth_id, $auth_token);

    // Set message parameters
    $params = array(
        'src' => '886282528258', // Sender's phone number with country code
        'dst' => '886926811898', // Receiver's phone number with country code
        'text' => 'Hi, Message from Plivo', // Your SMS text message
        // To send Unicode text
        //'text' => 'こんにちは、元気ですか？' # Your SMS Text Message - Japanese
        //'text' => 'Ce est texte généré aléatoirement' # Your SMS Text Message - French
        'url' => 'http://example.com/report/', // The URL to which with the status of the message is sent
        'method' => 'POST' // The method used to call the url
    );
    // Send message
    $response = $p->send_message($params);

    // Print the response
    echo "Response : ";
    print_r ($response['response']);

    // Print the Api ID
    echo "<br> Api ID : {$response['response']['api_id']} <br>";

    // Print the Message UUID
    echo "Message UUID : {$response['response']['message_uuid'][0]} <br>";

?>

<!--
Sample output
Response : Array
(
    [api_id] => 6debfaec-a25e-11e4-96e3-22000abcb9af
    [message] => message(s) queued
    [message_uuid] => Array ( [0] => 6dffe3ea-a25e-11e4-a6e4-22000afa12b0 )
)
Api ID : 6debfaec-a25e-11e4-96e3-22000abcb9af
Message UUID : 6dffe3ea-a25e-11e4-a6e4-22000afa12b0
-->