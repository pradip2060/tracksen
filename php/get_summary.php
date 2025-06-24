<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "expenses");

if ($conn->connect_error) {
  echo json_encode(["error" => $conn->connect_error]);
  exit();
}

$sql = "SELECT TotalSpent, MonthlyBudget, Savings FROM BudgetSummary LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo json_encode($row);
} else {
  echo json_encode(["TotalSpent" => 0, "MonthlyBudget" => 0, "Savings" => 0]);
}

$conn->close();
?>
