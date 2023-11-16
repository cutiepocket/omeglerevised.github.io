<?php
// chat_endpoint.php

// Set appropriate headers for CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

// Read incoming data
$data = file_get_contents("php://input");

// Example: Log the received message to a file
file_put_contents("chat_log.txt", $data . PHP_EOL, FILE_APPEND);

// In a real application, you would save the message to a database and handle user sessions.
// You might also want to implement security measures to prevent abuse.

// For simplicity, this script just echoes the received message.
echo $data;
?>
