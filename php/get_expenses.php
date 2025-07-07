<?php
header('Content-Type: application/json');

$host = "localhost";
$username = "root";
$password = ""; // your DB password
$dbname = "expenses";

// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  echo json_encode(["error" => $conn->connect_error]);
  exit();
}

// Select from editexpenses table and include ID
$sql = "SELECT ID, Category, Description, Date, Amount FROM editexpenses ORDER BY Date DESC";
$result = $conn->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);
$conn->close();
?>
