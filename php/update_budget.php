<?php
// filepath: c:\xampp\htdocs\tracksen\php\update_budget.php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "expenses");

if ($conn->connect_error) {
  echo json_encode(["success" => false, "error" => $conn->connect_error]);
  exit();
}

$monthlyBudget = $_POST['monthlyBudget'] ?? '';

if ($monthlyBudget === '' || !is_numeric($monthlyBudget)) {
  echo json_encode(["success" => false, "error" => "Invalid budget"]);
  exit();
}

// Update the MonthlyBudget in BudgetSummary table (assuming only one row)
$sql = "UPDATE BudgetSummary SET MonthlyBudget = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("d", $monthlyBudget);

if ($stmt->execute()) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "error" => $conn->error]);
}

$stmt->close();
$conn->close();
?>