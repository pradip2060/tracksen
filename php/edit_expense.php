<?php
// filepath: c:\xampp\htdocs\tracksen\PHP\edit_expense.php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'expenses');
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'DB connection failed']);
    exit;
}
$id = intval($_POST['id']);
$category = $_POST['category'];
$description = $_POST['description'];
$date = $_POST['date'];
$amount = floatval($_POST['amount']);
$sql = "UPDATE editexpenses SET Category=?, Description=?, Date=?, Amount=? WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdi", $category, $description, $date, $amount, $id);
$success = $stmt->execute();
if (!$success) {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
    $stmt->close();
    $conn->close();
    exit;
}
echo json_encode(['success' => $success]);
$stmt->close();
$conn->close();
?>