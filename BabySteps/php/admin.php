<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../php/login.php');
    exit;
}

$flash_success = $_SESSION['flash_success'] ?? [];
$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

// user delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['delete_user_id'])) {
    $del_id = (int) $_POST['delete_user_id'];

    if ($del_id === (int) $_SESSION['user_id']) {
        $flash_error[] = 'You cannot delete your own account.';
    } else {
        $stmt = $conn->prepare(
            "DELETE FROM users
             WHERE id = ?"
        );
        $stmt->bind_param('i', $del_id);
        if ($stmt->execute()) {
            $flash_success[] = 'User deleted successfully.';
        }
        $stmt->close();
    }
}

// tip delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['delete_tip_id'])) {
    $del_tip_id = (int) $_POST['delete_tip_id'];
    $stmt = $conn->prepare(
        "DELETE FROM wellness_tips
         WHERE id = ?"
    );
    $stmt->bind_param('i', $del_tip_id);
    if ($stmt->execute()) {
        $flash_success[] = 'Tip deleted successfully.';
    }
    $stmt->close();
}

// fetch users
$stmt = $conn->prepare(
    "SELECT id, username, email, due_date, created_at, role
     FROM users
     ORDER BY id ASC"
);
$stmt->execute();
$users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// fetch tips
$stmt = $conn->prepare(
    "SELECT id, category, subcategory, tip
     FROM wellness_tips
     ORDER BY category ASC, id ASC"
);
$stmt->execute();
$tips = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();

include __DIR__ . '/../html/admin_view.php';