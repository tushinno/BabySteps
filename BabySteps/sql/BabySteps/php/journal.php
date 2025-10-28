<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$uid = (int) $_SESSION['user_id'];
$role = $_SESSION['role'] ?? '';
$username = $_SESSION['username'] ?? '';

$stmt = $conn->prepare(
    "SELECT id, title, content, created_at
     FROM journal_entries
     WHERE user_id = ?
     ORDER BY created_at DESC"
);

$stmt->bind_param('i', $uid);
$stmt->execute();
$entries = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$flash_success = $_SESSION['flash_success'] ?? [];
$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

include __DIR__ . '/../html/journal_entries.php';