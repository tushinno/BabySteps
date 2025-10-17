<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (empty($_SESSION['user_id']) || empty($_SESSION['role'])) {
    header('Location: ../php/login.php');
    exit;
}

$is_admin = ($_SESSION['role'] === 'admin');
if (!$is_admin) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Access denied';
    exit;
}

$flash_success = $_SESSION['flash_success'] ?? [];
$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
    $del_id = (int) $_POST['delete_user_id'];
    if ($del_id === (int) $_SESSION['user_id']) {
        $flash_error[] = 'You cannot delete your own account.';
    } else {
        $stmt = $conn->prepare('DELETE FROM users WHERE id = ?');
        $stmt->bind_param('i', $del_id);
        if ($stmt->execute()) {
            $flash_success[] = 'User deleted successfully.';
        } else {
            $flash_error[] = 'Error deleting user: ' . $stmt->error;
        }
        $stmt->close();
    }
}

$stmt = $conn->prepare('SELECT id, username, email, due_date, created_at, role FROM users ORDER BY id ASC');
$stmt->execute();
$result = $stmt->get_result();
$users = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
$stmt->close();

$conn->close();

include __DIR__ . '/../html/admin_view.php';
