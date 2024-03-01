<?php
// Check if pincode is provided
if (isset($_POST['pincode'])) {
  // Retrieve the pincode from the POST request
  $pincode = $_POST['pincode'];
  $country = "IN";
  // Set your GeoNames username
  $username = "jeelviradiya";

  // URL for the GeoNames API
  $url = "http://api.geonames.org/postalCodeSearchJSON?postalcode={$pincode}&maxRows=10&username={$username}&country={$country}";

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

  // Create arrays to store cities, states, and countries
  $cities = array();
  $states = array();
  // $countries = array();

  // Check if data is available and contains postalCodes
  if ($data && isset($data['postalCodes'])) {
    // Iterate over postalCodes and extract city names
    foreach ($data['postalCodes'] as $location) {
      $city = $location['placeName'];
      $state = $location['adminName2'];
      // $country = $location['countryCode'];
      // Add city, state, and country to the respective arrays
      $cities[] = $city;
      $states[] = $state;
      $countries[] = "India";
    }
  }

  // Create an associative array to hold cities, states, and countries
  $result = array(
    'cities' => $cities,
    'states' => $states,
    'countries' => $countries
  );

  // Return result as JSON
  echo json_encode($result);
} else {
  // If pincode is not provided, return empty array
  echo json_encode(array());
}
