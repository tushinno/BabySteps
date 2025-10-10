<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = (int) $_SESSION['user_id'];
$due_date = '';

$stmt = $conn->prepare("SELECT due_date FROM users WHERE id = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $stmt->bind_result($due_date_db);
        if ($stmt->fetch()) {
            $due_date = $due_date_db;
        }
    }
    $stmt->close();
}
$conn->close();

$flash_success = $_SESSION['flash_success'] ?? [];
unset($_SESSION['flash_success']);

include __DIR__ . '/../html/tracker.php';