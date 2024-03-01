<?php
// Check if pincode is provided
if (isset($_POST['pincode'])) {
  // Retrieve the pincode from the POST request
  $pincode = $_POST['pincode'];

  // Set your GeoNames username
  $username = "your_geonames_username";

  // URL for the GeoNames API
  $url = "http://api.geonames.org/postalCodeSearchJSON?postalcode={$pincode}&maxRows=10&username={$username}";

  // Initialize cURL session
  $curl = curl_init();

  // Set cURL options
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true, // Follow redirects
    CURLOPT_CONNECTTIMEOUT => 10, // Timeout in seconds
    CURLOPT_TIMEOUT => 10, // Total timeout in seconds
  ));

  // Execute the cURL request
  $response = curl_exec($curl);

  // Close cURL session
  curl_close($curl);

  // Parse the JSON response
  $data = json_decode($response, true);

  // Create an array to store cities
  $cities = array();

  // Check if data is available and contains postalCodes
  if ($data && isset($data['postalCodes'])) {
    // Iterate over postalCodes and extract city names
    foreach ($data['postalCodes'] as $location) {
      $city = $location['placeName'];
      // Add city to the array
      $cities[] = $city;
    }
  }

  // Return cities as JSON
  echo json_encode($cities);
} else {
  // If pincode is not provided, return empty array
  echo json_encode(array());
}
