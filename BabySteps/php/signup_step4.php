<?php
require_once __DIR__ . '/db_connection.php';
require_once __DIR__ . '/check_session.php';

if (!isset($_SESSION['signup'])) {
    header("Location: ../html/signup_step1.php");
    exit;
}

$data = $_SESSION['signup'];
$username = $data['username'] ?? '';
$email = $data['email'] ?? '';
$password_hash = $data['password'] ?? '';
$due_date = $data['due_date'] ?? '';
$errors = [];

if ($username === '' || $email === '' || $password_hash === '') {
    $errors[] = "Incomplete signup data.";
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, due_date) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssss", $username, $email, $password_hash, $due_date);
        if ($stmt->execute()) {
            unset($_SESSION['signup']);
            $stmt->close();
            $conn->close();
            header("Location: ../html/signup_step4.php");
            exit;
        } else {
            $errors[] = "Failed to create account. Email or username may already be in use.";
            $stmt->close();
        }
    } else {
        $errors[] = "Database error. Please try again later.";
    }
}

$conn->close();

if (!empty($errors)) {
    $_SESSION['signup'] = $data;
    $_SESSION['flash_errors'] = $errors;
    header("Location: ../php/signup_step3.php");
    exit;
}