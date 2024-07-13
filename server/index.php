<?php
header("Content-Type: application/json");

$response = ["message" => "Hello from PHP"];

echo json_encode($response);
