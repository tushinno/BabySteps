<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = (int) $_SESSION['user_id'];
$username = $_SESSION['username'] ?? '';
$role = $_SESSION['role'] ?? '';

$stmt = $conn->prepare("SELECT id, title, content, created_at FROM journal_entries WHERE user_id = ? ORDER BY created_at DESC");
if (!$stmt) {
    die("Database error");
}
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$entries = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
$stmt->close();

$flash_success = $_SESSION['flash_success'] ?? [];
$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

include __DIR__ . '/../html/journal_entries.php';
