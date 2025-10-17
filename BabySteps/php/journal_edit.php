<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = (int) $_SESSION['user_id'];
$role = $_SESSION['role'] ?? '';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: journal.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $errors = [];

    if ($title === '' || $content === '') {
        $errors[] = "Title and content are required.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE journal_entries SET title = ?, content = ? WHERE id = ? AND user_id = ?");
        if ($stmt) {
            $stmt->bind_param('ssii', $title, $content, $id, $user_id);
            $stmt->execute();
            $stmt->close();
            $_SESSION['flash_success'][] = 'Entry updated.';
            header('Location: journal.php');
            exit;
        } else {
            $errors[] = "Database error.";
        }
    }

    $_SESSION['flash_error'] = $errors;
    header("Location: journal_edit.php?id={$id}");
    exit;
}

$stmt = $conn->prepare("SELECT title, content FROM journal_entries WHERE id = ? AND user_id = ? LIMIT 1");
if (!$stmt) {
    header('Location: journal.php');
    exit;
}
$stmt->bind_param('ii', $id, $user_id);
$stmt->execute();
$stmt->bind_result($title, $content);
$found = $stmt->fetch();
$stmt->close();

if (!$found) {
    header('Location: journal.php');
    exit;
}

$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_error']);

include __DIR__ . '/../html/journal_edit.php';
