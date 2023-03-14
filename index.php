<?php 
    $clientid = "YOUR_APP_CLIENTID"; // https://myanimelist.net/apiconfig
    $username = "YOUR_USERNAME"; //your MAL username
    $rvars = "status=watching&sort=list_updated_at"; // your request vars https://myanimelist.net/apiconfig/references/api/v2#tag/user-animelist
    header('Content-Type: application/json'); // Specify the type of data
    $url = "https://api.myanimelist.net/v2/users/{$username}/animelist?{$rvars}";
    $ch = curl_init($url); // Initialise cURL
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'X-MAL-CLIENT-ID: '.$clientid )); // Inject the token into the header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
    $result = curl_exec($ch); // Execute the cURL statement
    // Decoding JSON data
    $decodedData =
        json_decode($result, true);
    // Decoded form
    var_dump($decodedData);
    curl_close($ch); // Close the cURL connection
?>