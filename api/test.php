<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    http_response_code(303);
    header("HTTP/1.1 303 See Other");
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "Hello World!";
}