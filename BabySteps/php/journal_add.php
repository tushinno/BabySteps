<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$uid = (int) $_SESSION['user_id'];
$role = $_SESSION['role'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $errors = [];

    if ($title === '' || $content === '') {
        $errors[] = 'Title and content are required.';
    }

    if (empty($errors)) {
        $stmt = $conn->prepare(
            "INSERT INTO journal_entries (user_id, title, content, created_at)
             VALUES (?, ?, ?, NOW())"
        );

        if ($stmt) {
            $stmt->bind_param('iss', $uid, $title, $content);
            $stmt->execute();
            $stmt->close();
            $_SESSION['flash_success'][] = 'Entry added.';
            header('Location: journal.php');
            exit;
        }
    }
    $_SESSION['flash_error'] = $errors;
    header('Location: journal_add.php');
    exit;
}

$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_error']);

include __DIR__ . '/../html/journal_add.php';