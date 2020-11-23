
<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '5000', //Enter any amount of results you want
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: your api key'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
$data = json_decode($response, true); // print json decoded response
curl_close($curl); // Close request
?>
<?php
//print_r ($data);
foreach($data['data'] as $coin){

	echo 'Name: ' . $coin['name'] . ', ' . 'Price: ' .  $coin['quote']['USD']['price'] . '<br>' ;
}
?>
