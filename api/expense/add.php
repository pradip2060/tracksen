<?php
// filepath: c:\xampp\htdocs\tracksen\PHP\add_expense.php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'expenses');
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'DB connection failed']);
    exit;
}
$category = $_POST['category'];
$description = $_POST['description'];
$date = $_POST['date'];
$amount = floatval($_POST['amount']);
$sql = "INSERT INTO editexpenses (Category, Description, Date, Amount) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssd", $category, $description, $date, $amount);
$success = $stmt->execute();
echo json_encode(['success' => $success]);
$stmt->close();
$conn->close();
?>