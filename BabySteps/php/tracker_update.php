<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

$user_id = (int) $_SESSION['user_id'];
$due_date = trim($_POST['due_date']);

$errors = [];

if ($due_date === '') {
    $errors[] = 'Please enter a due date.';
} else {
    $today = new DateTime();
    $entered_date = new DateTime($due_date);
    $days_diff = (int)$entered_date->diff($today)->days;

    if ($entered_date < (clone $today)->modify('-2 years')) {
        $errors[] = 'That’s way too far in the past! Please enter a recent date.';
    } elseif ($entered_date < $today) {
        $errors[] = 'Your child is already born! Please enter a future date.';
    } elseif ($entered_date > (clone $today)->modify('+1 year')) {
        $errors[] = 'That’s too far in the future! Please enter a realistic due date.';
    }
}

if (!empty($errors)) {
    $_SESSION['flash_error'] = $errors;
    header('Location: tracker.php');
    exit;
}

$stmt = $conn->prepare("UPDATE users SET due_date = ? WHERE id = ?");
$stmt->bind_param("si", $due_date, $user_id);
$stmt->execute();
$stmt->close();
$conn->close();

$_SESSION['flash_success'][] = 'Due date updated successfully.';
header('Location: tracker.php');
exit;
