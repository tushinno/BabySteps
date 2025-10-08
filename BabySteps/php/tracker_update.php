<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tracker.php');
    exit;
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = (int) $_SESSION['user_id'];
$due_date = trim($_POST['due_date'] ?? '');

if ($due_date === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $due_date)) {
    header('Location: tracker.php');
    exit;
}

$parts = explode('-', $due_date);
if (!checkdate((int)$parts[1], (int)$parts[2], (int)$parts[0])) {
    header('Location: tracker.php');
    exit;
}

$stmt = $conn->prepare("UPDATE users SET due_date = ? WHERE id = ?");
if ($stmt) {
    $stmt->bind_param("si", $due_date, $user_id);
    if ($stmt->execute()) {
        $_SESSION['flash_success'][] = 'Due date updated.';
    }
    $stmt->close();
}

$conn->close();

header('Location: tracker.php');
exit;