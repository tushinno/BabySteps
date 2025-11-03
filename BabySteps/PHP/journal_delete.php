<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = (int) $_SESSION['user_id'];
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id !== false && $id > 0) {
    $stmt = $conn->prepare(
        "DELETE FROM journal_entries
         WHERE id = ? AND user_id = ?"
    );

    if ($stmt) {
        $stmt->bind_param('ii', $id, $user_id);
        $stmt->execute();
        $stmt->close();
        $_SESSION['flash_success'][] = 'Entry deleted.';
    }
}

header('Location: journal.php');
exit;