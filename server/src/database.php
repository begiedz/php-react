<?php
require_once 'config.php';

function connect_db($config)
{
  $host = $config['host'];
  $database = $config['database'];
  $user = $config['user'];
  $password = $config['password'];

  try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }
}
