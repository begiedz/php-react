<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once '../src/database.php';

$conn = connect_db($configuration);

$sql = "SELECT * FROM messages";

try {
  $stmt = $conn->query($sql);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
  //   if ($row) {
  //     $response = array("message" => $row["message"]);
  // } else {
  //     $response = array("message" => "No message found");
  // }

  if ($rows) {
    $response = $rows;
  } else {
    $response = array("message" => "No data");
  }
} catch (PDOException $e) {
  die("Query failed: " . $e->getMessage());
}
$conn = null;
echo json_encode($response);
