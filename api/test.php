<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    http_response_code(303);
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "Hello World!";
}