<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

$user_id = (int) $_SESSION['user_id'];
$due_date = trim($_POST['due_date']);

$stmt = $conn->prepare("UPDATE users SET due_date = ? WHERE id = ?");
$stmt->bind_param("si", $due_date, $user_id);
$stmt->execute();
$stmt->close();
$conn->close();

$_SESSION['flash_success'][] = 'Due date updated.';
header('Location: tracker.php');
exit;
?>