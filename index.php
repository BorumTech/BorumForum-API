<?php
# Made by ChatGPT

// Extract the request method and path from the PHP global variables
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Check the request method and path to determine the appropriate response
if ($method === 'GET' && preg_match('/^\/([^\/]+)/', $path, $matches)) {
  // Extract the name of the file from the route
  $name = $matches[1];

  // Check if the file exists and is readable
  $filePath = "api/$name.php";
  if (is_readable($filePath)) {
    // Include the file and return its output
    include $filePath;
  } else {
    // Return a 404 error if the file does not exist or is not readable
    http_response_code(404);
    echo 'Not Found';
  }
} else if (preg_match('/^\/questions\/(\d+)$/', $uri, $matches)) {
  // The path matches the route, so retrieve the number from the URL
  $number = intval($matches[1]);
  $filePath = "api/question.php?id=$number";
  // Retrieve and display the relevant information for the question with the ID $number
} else {
  // Return a 404 error for any other paths or methods
  http_response_code(404);
  echo 'Not Found';
}