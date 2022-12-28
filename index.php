<?php
# Made by ChatGPT

// Extract the request method and path from the PHP global variables
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

if ($method === 'GET' && preg_match('/^\/questions\/(\d+)$/', $path, $matches)) {
  // The path matches the route, so retrieve the number from the URL
  $number = intval($matches[1]);
  $filePath = $_SERVER['DOCUMENT_ROOT'] . "\api\question.php";
  if (is_readable($filePath)) {
    $_GET['id'] = $number;
    include $filePath;
    exit();
  }
} else if ($method === 'GET' && preg_match('/^\/([^\/]+)/', $path, $matches)) {
  // Extract the name of the file from the route
  $name = $matches[1];

  // Check if the file exists and is readable
  $filePath = "api/$name.php";
  if (is_readable($filePath)) {
    // Include the file and return its output
    include $filePath;
    exit();
  }
} 

// Return a 404 error for any other paths or methods
http_response_code(404);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borum Forum API</title>
</head>

<body>
<h1>Borum Forum REST API</h1>
</body>

</html>