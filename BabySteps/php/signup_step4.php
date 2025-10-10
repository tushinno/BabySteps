<?php
require_once __DIR__ . '/db_connection.php';
require_once __DIR__ . '/check_session.php';

if (empty($_SESSION['signup'])) {
    header("Location: ../php/signup_step1.php");
    exit;
}

$username = $_SESSION['signup']['username'];
$email = $_SESSION['signup']['email'];
$password_hash = $_SESSION['signup']['password'];
$due_date = $_SESSION['signup']['due_date'];

$stmt = $conn->prepare("INSERT INTO users (username, email, password, due_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $password_hash, $due_date);

if ($stmt->execute()) {
    unset($_SESSION['signup']);
    $stmt->close();
    $conn->close();
    header("Location: ../html/signup_step4.php");
    exit;
}

$stmt->close();
$conn->close();
header("Location: ../php/signup_step1.php");
exit;